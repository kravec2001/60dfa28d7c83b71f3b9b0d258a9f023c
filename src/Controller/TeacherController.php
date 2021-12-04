<?php


namespace App\Controller;

use App\Entity\PsbEventsProfile;
use App\Entity\PsbProfiles;
use App\Entity\PsbUser;
use App\Entity\Role;
use App\Form\AddProfileForm;
use App\Form\ProfileForm;
use App\Form\SetProfileForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeacherController extends AbstractController
{

    /**
     * @Route("/teacher", name="teacher")
     */
    public function teacherMain(): Response
    {
        return $this->redirectToRoute('teacher_card');
    }

    /**
     * @Route("/teacher/card", name="teacher_card")
     */
    public function teacherCard(): Response
    {
        $this->denyAccessUnlessGranted(Role::TEACHER);

        /** @var User $user */
        $user = $this->getUser();

        $em = $this->get('doctrine')->getManager();

        $query = $em->createQuery(
            'SELECT p.id, p.fio, p.img, p.phone, p.email, t.name post, d.name depart,
                    count(1) cnt, sum(e.status) cnty,
                    (count(1) - sum(e.status)) cntn,
                     (sum(e.status) / count(1)) prc
                       FROM App\Entity\PsbUser p, 
                            App\Entity\PsbPosts t, 
                            App\Entity\PsbDeparts d,   
                            App\Entity\PsbEventsPers e             
                       WHERE p.idTeacher = ' . $user->getId() . '
                         AND p.idPost = t.idPost
                         AND p.idDepart = d.id         
                         AND e.idUser = p.id      
                         group by p.id, p.fio, p.img, p.phone, p.email, t.name, d.name 
                       ORDER BY p.idManager, p.fio');
        $users = $query->getResult();

        $query = $em->createQuery(
            'SELECT e.event, t.name, (u.dateStart + e.beginDaysAfter) date, e.countDays 
               FROM App\Entity\PsbEventsPers p,
                    App\Entity\PsbEvents e,
                    App\Entity\PsbEventsTypes t, 
                    App\Entity\PsbUser u
              WHERE u.idTeacher = ' . $user->getId() . '                
                AND p.idEvents = e.id
                AND p.status = 0
                AND t.id = e.typEvent
                AND u.id = p.idUser
                AND e.doMentor = 1 
                order by u.dateStart + e.beginDaysAfter 
               ');
        $events = $query->getResult();

        return $this->render('teacher/card.html.twig', [
            'title' => 'Карта наставника',
            'breadcrumbs' => [
                [
                    'url' => $this->generateUrl('teacher'),
                    'name' => 'Кабинет наставника',
                ],
                [
                    'name' => 'Карта наставника',
                ],
            ],
            'users' => $users,
            'events' => $events,
        ]);
    }

    /**
     * @Route("/teacher/profile", name="teacher_profile")
     */
    public function newplanAction(Request $request): Response
    {
        $this->denyAccessUnlessGranted(Role::TEACHER);

        $formData = $request->get(ProfileForm::NAME);
        unset($formData['_token']);

        $desc = "";
        $users = [];

        if (!isset($formData['profileId'])) {
            $formData['profileId'] = null;
            $formData['usl'] = [];
        } else if (isset($formData['profileId'])) {
            $last = $request->getSession()->get('profileId', -1);
            $request->getSession()->save();
            $formData['usl'] = [];

            $dataset = $this->getDoctrine()->getRepository(PsbEventsProfile::class)->findBy([
                'idProfile' => $formData['profileId']
            ]);

            foreach ($dataset as $item) {
                $formData['usl'][] = [
                    'profileId' => $item->getidProfile() . "",
                    'idEvents' => $item->getidEvents() . "",
                ];
            }
        }

        $request->request->set(ProfileForm::NAME, $formData);

        $newProfileForm = $this->createForm(ProfileForm::class, $formData, [
            'em' => $this->getDoctrine()->getManager(),
        ]);

        $newProfileForm->handleRequest($request);

        return $this->render('teacher/newprofile.html.twig', [
            'title' => 'Управление профилями обучения',
            'form' => $newProfileForm->createView(),
            'breadcrumbs' => [
                [
                    'url' => $this->generateUrl('teacher'),
                    'name' => 'Кабинет наставника',
                ],
                [
                    'name' => 'Управление профилями обучения',
                ],
            ],
        ]);
    }


    /**
     * @Route("/teacher/addprofile", name="teacher_add_profile")
     */
    public function show(Request $request): Response
    {
        $this->denyAccessUnlessGranted(Role::TEACHER);

        $events = new PsbProfiles();
        $form = $this->createForm(AddProfileForm::class, $events, [
            'em' => $this->getDoctrine()->getManager(),
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $prof = $form['profile']->getData();
            $events->setProfile($prof);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($events);
            $entityManager->flush();
            return $this->redirectToRoute('teacher_profile');
        }

        return $this->render('teacher/addprofile.html.twig', [
            'title' => 'Управление профилями обучения',
            'form' => $form->createView(),
            'breadcrumbs' => [
                [
                    'url' => $this->generateUrl('teacher'),
                    'name' => 'Кабинет наставника',
                ],
                [
                    'name' => 'Управление профилями обучения',
                ],
            ],
        ]);

    }

    /**
     * @Route("/teacher/calendar", name="teacher_calendar")
     */
    public function userCalendar(): Response
    {
        $this->denyAccessUnlessGranted(Role::TEACHER);

        /** @var User $user */
        $user = $this->getUser();

        $em = $this->get('doctrine')->getManager();

        $query = $em->createQuery(
            'SELECT e.event, t.name, (u.dateStart + e.beginDaysAfter) date, e.countDays 
               FROM App\Entity\PsbEventsPers p,
                    App\Entity\PsbEvents e,
                    App\Entity\PsbEventsTypes t, 
                    App\Entity\PsbUser u
              WHERE u.idTeacher = ' . $user->getId() . '
                AND p.idEvents = e.id
                AND p.status = 0
                AND t.id = e.typEvent
                AND u.id = p.idUser
                AND e.doMentor = 1
                AND (u.dateStart + e.beginDaysAfter) - 1  = current_date()       
                order by u.dateStart + e.beginDaysAfter                  
               ');
        $events = $query->getResult();


        return $this->render('teacher/calendar.html.twig', [
            'title' => 'Календарь событий',
            'breadcrumbs' => [
                [
                    'url' => $this->generateUrl('teacher'),
                    'name' => 'Кабинет наставника',
                ],
                [
                    'name' => 'Календарь событий',
                ],
            ],
            'events' => $events,
        ]);
    }

    /**
     * @Route("/teacher/setprofile", name="teacher_set_profile")
     */
    public function newSetAction(Request $request): Response
    {
        $this->denyAccessUnlessGranted(Role::TEACHER);

        $formData = $request->get(SetProfileForm::NAME);
        unset($formData['_token']);

        $desc = "";
        $users = [];

        if (!isset($formData['profileId'])) {
            $formData['profileId'] = null;
            $formData['usl'] = [];
        } else if (isset($formData['profileId'])) {
            $last = $request->getSession()->get('profileId', -1);
            $request->getSession()->save();
            $formData['usl'] = [];

            $dataset = $this->getDoctrine()->getRepository(PsbEventsProfile::class)->findBy([
                'idProfile' => $formData['profileId']
            ]);

            foreach ($dataset as $item) {
                $formData['usl'][] = [
                    'profileId' => $item->getidProfile() . "",
                    'idEvents' => $item->getidEvents() . "",
                ];
            }
        }

        $request->request->set(SetProfileForm::NAME, $formData);

        $newProfileForm = $this->createForm(SetProfileForm::class, $formData, [
            'em' => $this->getDoctrine()->getManager(),
        ]);

        $newProfileForm->handleRequest($request);

        return $this->render('teacher/setprofile.html.twig', [
            'title' => 'Назначение плана сотруднику',
            'form' => $newProfileForm->createView(),
            'breadcrumbs' => [
                [
                    'url' => $this->generateUrl('teacher'),
                    'name' => 'Кабинет наставника',
                ],
                [
                    'name' => 'Назначение плана сотруднику',
                ],
            ],
        ]);
    }


}
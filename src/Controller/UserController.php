<?php


namespace App\Controller;

use App\Entity\PsbInfo;
use App\Entity\PsbProjects;
use App\Entity\PsbProjectUsers;
use App\Entity\PsbTests;
use App\Entity\PsbUser;
use App\Entity\Role;
use App\Entity\PsbEvents;
use App\Entity\PsbEventsPers;
use App\Entity\PsbEventsTypes;
use App\Form\TestingForm;
use App\Form\UserProjectForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

    /**
     * @Route("/user", name="user")
     */
    public function userMain(): Response
    {
        return $this->redirectToRoute('user_card');
    }

    /**
     * @Route("/user/card", name="user_card")
     */
    public function userCard(): Response
    {
        $this->denyAccessUnlessGranted(Role::USER);

        /** @var User $user */
        $user = $this->getUser();

        $em = $this->get('doctrine')->getManager();
        $query = $em->createQuery(
            'SELECT count(1) cnt, sum(p.status) cnty,
                    (count(1) - sum(p.status)) cntn,
                     (sum(p.status) / count(1)) prc
               FROM App\Entity\PsbEventsPers p
              WHERE p.idUser = ' . $user->getId() . '                
               ');
        $status = $query->getResult();

        $manager = $this->getDoctrine()->getRepository( PsbUser::class)->findOneBy([
            'id' =>  $user->getPsbUser()->getIdManager()
        ]);

        $teacher = $this->getDoctrine()->getRepository( PsbUser::class)->findOneBy([
            'id' =>  $user->getPsbUser()->getidTeacher()
        ]);

        $em = $this->get('doctrine')->getManager();

        $query = $em->createQuery(
            'SELECT e.event, t.name, (u.dateStart + e.beginDaysAfter) date, e.countDays 
               FROM App\Entity\PsbEventsPers p,
                    App\Entity\PsbEvents e,
                    App\Entity\PsbEventsTypes t, 
                    App\Entity\PsbUser u
              WHERE p.idUser = ' . $user->getId() . '                
                AND p.idEvents = e.id
                AND p.status = 0
                AND t.id = e.typEvent
                AND u.id = p.idUser 
                order by p.numberOrder
               ');
        $events = $query->getResult();

        return $this->render('user/card.html.twig', [
            'title' => 'Карта сотрудника',
            'breadcrumbs' => [
                [
                    'url' => $this->generateUrl('user'),
                    'name' => 'Кабинет сотрудника',
                ],
                [
                    'name' => 'Карта сотрудника',
                ],
            ],
            'status' => $status,
            'manager' => $manager,
            'teacher' => $teacher,
            'events' => $events,
        ]);
    }

    /**
     * @Route("/user/idea", name="user_idea")
     */
    public function userIdea(): Response
    {
        $this->denyAccessUnlessGranted(Role::USER);

        return $this->render('user/idea.html.twig', [
            'title' => 'Идеи и предложения',
            'breadcrumbs' => [
                [
                    'url' => $this->generateUrl('user'),
                    'name' => 'Кабинет сотрудника',
                ],
                [
                    'name' => 'Идеи и предложения',
                ],
            ],
        ]);
    }

    /**
     * @Route("/user/gift", name="user_gift")
     * @Route("/user/gift/{id}", name="user_gift")
     */
    public function userGift($id=null): Response
    {
        $this->denyAccessUnlessGranted(Role::USER);

        return $this->render('gift/gift.html.twig', [
            'title' => 'Выбор подарков',
            'breadcrumbs' => [
                [
                    'url' => $this->generateUrl('user'),
                    'name' => 'Кабинет сотрудника',
                ],
                [
                    'name' => 'Выбор подарков',
                ],
            ],
            'bonus' => $this->getUser()->getPsbUser()->getBonus(),
            'return' => (isset($id) ? 1 : 0)
        ]);
    }

    /**
     * @Route("/user/info", name="user_info")
     * @Route("/user/info/{id}", name="user_info")
     */
    public function user_info($id = null): Response
    {
        $this->denyAccessUnlessGranted(Role::USER);

        $em = $this->get('doctrine')->getManager();

        if (!isset($id)) {
            $id = 1;
            $return = 0;
        } else {
            $return = 1;
        }

        $info = $em->getRepository(PsbInfo::class)
            ->FindOneBy(['typeInfo' => 0, 'id' => $id]);

        if (!isset($info)) {

            $this->addFlash('danger', "Информация  с идентификатором " . $id . " не найдена");
            return $this->redirectToRoute('user');
        }

        return $this->render('dashboard/info.html.twig', [
            'title' => $info->getTitle(),
            'breadcrumbs' => [
                [
                    'url' => $this->generateUrl('user'),
                    'name' => 'Кабинет сотрудника',
                ],
                [
                    'name' => $info->getTitle(),
                ],
            ],
            'data' => $info,
            'return' => $return
        ]);
    }

    /**
     * @Route("/user/testing", name="user_testing")
     * @Route("/user/testing/{id}", name="user_testing")
     */
    public function expertAction(Request $request, $id = null): Response
    {
        $this->denyAccessUnlessGranted(Role::USER);

        $formData = $request->get(TestingForm::NAME);
        unset($formData['_token']);

        if ($id > 0) {
            $formData['testId'] = $id;
        }

        if (!isset($formData['testId'])) {
            $formData['testId'] = null;
            $formData['tasks'] = [];
        } else if (isset($formData['testId']) ) {
            $last = $request->getSession()->get('testId', -1);

            if ($last != $formData['testId'] || (! isset($formData['tasks']))) {
                $request->getSession()->set('testId', $formData['testId']);
                $request->getSession()->save();

                $formData['desc'] = '';

                $test = $this->getDoctrine()->getRepository(PsbTests::class)->findOneBy([
                    'id' => $formData['testId']
                ]);

                if (!isset($test)) {
                    $this->addFlash('danger', "Тест с идентификатором " . $id . " не найден");
                    return $this->redirectToRoute('user');
                }

                $formData['desc'] = $test->GetDescript();

                $formData['tasks'] = [];

                $em = $this->get('doctrine')->getManager();

                $query = $em->createQuery(
                    'SELECT t.id, t.task, t.imgTask, t.bonus, 
                            t.answer1, t.answer2, t.answer3, t.answer4
                       FROM App\Entity\PsbTasks t               
                       WHERE t.idTest = '.$formData['testId']);

                $tasks = $query->getResult();

                foreach ($tasks as $tasks) {
                    $formData['tasks'][] = $tasks;
                }
            }

        }

        $request->request->set(TestingForm::NAME, $formData);

        $newTestingForm = $this->createForm(TestingForm::class, $formData, [
            'em' => $this->getDoctrine()->getManager(),
        ]);

        $newTestingForm->handleRequest($request);

        if ($newTestingForm->isSubmitted() && isset($formData['save'])) {

            $request->getSession()->remove('testId');

            if (isset($id)) {
                return $this->redirect("/user/map/?save");
            } else {
                return $this->redirect("/user/");
            }
        }

        return $this->render('user/testing.html.twig', [
            'title' => 'Тестирование',
            'form' => $newTestingForm->createView(),
            'breadcrumbs' => [
                [
                    'url' => $this->generateUrl('user'),
                    'name' => 'Кабинет сотрудника',
                ],
                [
                    'name' => 'Тестирование',
                ],
            ],
        ]);
    }

    /**
     * @Route("/user/project", name="user_project")
     * @Route("/user/project/{id}", name="user_project")
     * @Route("/admin/project", name="admin_project")
     * @Route("/teacher/project", name="teacher_project")
     */
    public function ProjectAction(Request $request, $id = null): Response
    {
        if (!$this->isGranted(Role::ADMIN) &&
            !$this->isGranted(Role::TEACHER) &&
            !$this->isGranted(Role::USER)) {
            throw $this->createAccessDeniedException();
        }

        $formData = $request->get(UserProjectForm::NAME);
        unset($formData['_token']);

        $desc = "";
        $users = [];

        if ($id > 0) {
            $formData['id'] = $id;
            $formData['projectId'] = $id;
        }

        if (! isset($formData['projectId'])) {
            $formData['projectId'] = null;
            $formData['users'] = [];
        } else if (isset($formData['projectId']) ) {
            $last = $request->getSession()->get('projectId', -1);

            if ($last != $formData['projectId'] || (! isset($formData['desc']) && ! isset($formData['users']))) {
                $request->getSession()->set('projectId', $formData['projectId']);

                $project = $this->getDoctrine()->getRepository(PsbProjects::class)->findOneBy([
                    'id' => $formData['projectId']
                ]);

                if (!isset($project)) {
                    $this->addFlash('danger', "Проект с идентификатором " . $id . " не найден");
                    return $this->redirectToRoute('user');
                }

                $desc = $project->getDescript();

                $dataset = $this->getDoctrine()->getRepository(PsbProjectUsers::class)->findBy([
                    'idProject' => $formData['projectId']
                ]);

                $ids = "";

                foreach ($dataset as $item) {

                    $ids .= strval($item->getIdUser()) . ',';
                }
                $ids .= strval($project->getIdManager());

                $em = $this->get('doctrine')->getManager();

                $query = $em->createQuery(
                    'SELECT p.id, p.fio, p.img, p.phone, p.email, t.name post, d.name depart 
                       FROM App\Entity\PsbUser p, App\Entity\PsbPosts t, App\Entity\PsbDeparts d               
                       WHERE p.idUser in ('.$ids.')
                         AND p.idPost = t.idPost
                         AND p.idDepart = d.id              
                       ORDER BY p.idManager, p.fio');

                $users = $query->getResult();
            }
        }
        $request->getSession()->save();

        $request->request->set(UserProjectForm::NAME, $formData);

        $newProjectForm = $this->createForm(UserProjectForm::class, $formData, [
            'em' => $this->getDoctrine()->getManager(),
            'lock' => true,
        ]);

        $newProjectForm->handleRequest($request);

        if ($newProjectForm->isSubmitted() && isset($formData['save'])) {

            $request->getSession()->remove('projectId');

            return $this->redirect("/user/map/?save");
        }

        return $this->render('user/project.html.twig', [
            'title' => 'Текущие проекты',
            'form' => $newProjectForm->createView(),
            'breadcrumbs' => [
                [
                    'url' => $this->generateUrl(
                            ($this->isGranted(Role::ADMIN) ? 'admin' :
                            ($this->isGranted(Role::TEACHER) ? 'teacher' : 'user'))
                    ),
                    'name' => 'Кабинет '.($this->isGranted(Role::ADMIN) ? 'руководителя' :
                                         ($this->isGranted(Role::TEACHER) ? 'наставника' : 'пользователя')),
                ],
                [
                    'name' => 'Текущие проекты',
                ],
            ],
            'desc' => $desc,
            'users' => $users,
            'return' => (isset($id) ? 1 : 0)
        ]);
    }

}
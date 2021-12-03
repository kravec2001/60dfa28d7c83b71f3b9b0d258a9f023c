<?php


namespace App\Controller;

use App\Entity\PsbUser;
use App\Entity\Role;
use App\Entity\PsbEvents;
use App\Entity\PsbEventsPers;
use App\Entity\PsbEventsTypes;
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
    public function userCrad(): Response
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

}
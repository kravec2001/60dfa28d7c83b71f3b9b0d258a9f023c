<?php


namespace App\Controller;

use App\Entity\PsbTasks;
use App\Entity\PsbTests;
use App\Entity\PsbUser;
use App\Entity\PsbProjects;
use App\Entity\PsbProjectUsers;
use App\Entity\Role;
use App\Form\TestingForm;
use App\Form\UserProjectForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
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

        $em = $this->get('doctrine')->getManager();
        $query = $em->createQuery(
            'SELECT e.event 
               FROM App\Entity\PsbEventsPers p,
                    App\Entity\PsbEvents e
              WHERE p.idUser = ' . $user->getId() . '                
                AND p.idEvents = e.id
                AND p.status = 0
                order by p.numberOrder
               ');
        $events = $query->getResult();

        return $this->render('user/card.html.twig', [
            'title' => 'Карта сотрудника',
            'breadcrumbs' => [
                [
                    'url' => $this->generateUrl('user_dashboard'),
                    'name' => 'Кабинет сотрудника',
                ],
                [
                    'name' => 'Карта сотрудника',
                ],
            ],
            'status' => $status,
            'manager' => $manager,
            'events' => $events,
        ]);
    }



}
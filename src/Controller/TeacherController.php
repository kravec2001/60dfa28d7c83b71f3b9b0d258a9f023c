<?php


namespace App\Controller;

use App\Entity\PsbUser;
use App\Entity\Role;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeacherController extends AbstractController
{

    /**
     * @Route("/teacher", name="teacher")
     */
    public function adminMain(): Response
    {
        return $this->redirectToRoute('teacher_card');
    }

    /**
     * @Route("/teacher/card", name="teacher_card")
     */
    public function adminCard(): Response
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

        return $this->render('teacher/card.html.twig', [
            'title' => 'Карта наставника',
            'breadcrumbs' => [
                [
                    'url' => $this->generateUrl('admin'),
                    'name' => 'Кабинет наставника',
                ],
                [
                    'name' => 'Карта наставника',
                ],
            ],
            'users' => $users,
        ]);
    }



}
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

        return $this->render('user/card.html.twig', [
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
        ]);
    }



}
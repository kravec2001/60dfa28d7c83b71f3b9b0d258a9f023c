<?php

namespace App\Controller;

use App\Entity\PsbUser;
use App\Entity\Role;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/user/dashboard", name="user_dashboard")
     */
    public function user(): Response
    {
        $this->denyAccessUnlessGranted(Role::USER);

        return $this->render('dashboard/user.html.twig', [
            'title' => 'Кабинет пользователя'
        ]);
    }

    /**
     * @Route("/teacher/dashboard", name="teacher_dashboard")
     */
    public function teacher(): Response
    {
        $this->denyAccessUnlessGranted(Role::TEACHER);

        return $this->render('dashboard/teacher.html.twig', [
            'title' => 'Кабинет пользователя'
        ]);
    }

    /**
     * @Route("/admin/dashboard", name="admin_dashboard")
     */
    public function admin(): Response
    {
        $this->denyAccessUnlessGranted(Role::ADMIN);

        return $this->render('dashboard/admin.html.twig', [
            'title' => 'Кабинет администратора',
        ]);
    }

}

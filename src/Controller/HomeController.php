<?php

namespace App\Controller;

use App\Entity\Role;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(): Response
    {

        if ($this->isGranted(Role::ADMIN)) {
            return $this->redirectToRoute('admin_dashboard');
        }

        if ($this->isGranted(Role::TEACHER)) {
            return $this->redirectToRoute('teacher_dashboard');
        }

        if ($this->isGranted(Role::USER)) {
            return $this->redirectToRoute('user');
        }

        return $this->redirectToRoute('app_logout');
    }
}

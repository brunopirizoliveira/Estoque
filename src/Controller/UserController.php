<?php

namespace App\Controller;

use App\Helper\UserFactory;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    private $userFactory;
    private $entityManagerInterface;
    private $userRepository;

    public function __construct(UserFactory $userFactory, EntityManagerInterface $entityManagerInterface, UserRepository $userRepository)
    {
        $this->userFactory = $userFactory;
        $this->entityManagerInterface = $entityManagerInterface;
        $this->userRepository = $userRepository;
    }

    /**
     * @Route("/account", name="account")
     */
    public function index()
    {
        return $this->render('user/account.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/create-user", name="create-user")
     */
    public function create()
    {
        return $this->render('user/create.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/store-user", name="store-user")
     */
    public function store(Request $request)
    {
        $dadosJson = \json_encode($request->request->all());
        $user = $this->userFactory->mount($dadosJson);
        
        $this->entityManagerInterface->persist($user);
        $this->entityManagerInterface->flush();

        return $this->redirectToRoute('app_login');
    }

    /**
     * @Route("list-user", name="list-user")
     */
    public function list()
    {
        $users = $this->userRepository->findAll();
        
        return $this->render('user/list.html.twig', [
            'users' => $users,
        ]);        
    }

}

<?php
// src/Controller/LoginController.php
/*
namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    #[Route('/connexion', name: 'app_login', methods: ['POST'])]
    public function login(
        Request $request,
        UserRepository $userRepository,
        UserPasswordHasherInterface $passwordHasher
    ): JsonResponse {
        // Récupérer les données JSON envoyées dans la requête
        $data = json_decode($request->getContent(), true);

        // Vérifier que l'email et le mot de passe sont fournis
        if (!isset($data['email']) || !isset($data['password'])) {
            return new JsonResponse(['message' => 'Email et mot de passe requis'], 400);
        }

        // Chercher l'utilisateur en fonction de l'email
        $user = $userRepository->findByEmail($data['email']);
        if (!$user) {
            return new JsonResponse(['message' => 'Utilisateur non trouvé'], 404);
        }

        // Vérifier le mot de passe
        if (!$passwordHasher->isPasswordValid($user, $data['password'])) {
            return new JsonResponse(['message' => 'Mot de passe incorrect'], 401);
        }

        // Connexion réussie
        return new JsonResponse([
            'message' => 'Connexion réussie',
            'user' => [
                'id' => $user->getId(),
                'email' => $user->getEmail(),
            ],
        ]);
    }
}
*/


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Doctrine\DBAL\Connection;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class LoginController extends AbstractController
{
    /*
    private $connection;

    // Constructeur pour injecter la connexion à la base de données
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    // Méthode pour gérer la connexion avec un formulaire classique
    
    public function login(Request $request, SessionInterface $session)
    {
        // Récupérer les données envoyées par le formulaire
        $email = $request->request->get('email');
        $password = $request->request->get('mdp');

        // Requête SQL pour vérifier l'email
        $sql = "SELECT * FROM user WHERE email = :email";
        $user = $this->connection->fetchAssociative($sql, ['email' => $email]);

        // Vérification du mot de passe
        if ($user && password_verify($password, $user['mdp'])) {
            // Connexion réussie, on stocke les informations de l'utilisateur dans la session
            $session->set('user', [
                'id' => $user['id'],
                'email' => $user['email'],
                // On peut ajouter d'autres informations si nécessaire
            ]);

            // Rediriger vers la page d'accueil (ou une autre page)
            return new RedirectResponse('/');
        }

        // Si la connexion échoue, afficher un message d'erreur
        return $this->render('connexion.html.twig', [
            'error' => 'Email ou mot de passe incorrect',
        ]);
    }

    // Méthode pour gérer la déconnexion
    public function logout(SessionInterface $session)
    {
        $session->remove('user'); // Supprimer les données de session

        // Rediriger vers la page d'accueil après la déconnexion
        return new RedirectResponse('/');
    }*/

    private EntityManagerInterface $entityManager;
    private UserPasswordHasherInterface $passwordHasher;
    private $requestStack;

    public function __construct(EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher, RequestStack $requestStack)
    {
        $this->entityManager = $entityManager;
        $this->passwordHasher = $passwordHasher;
        $this->requestStack = $requestStack;
    }

    #[Route('/login', name: 'api_login', methods: ['POST'])]
    public function login(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $email = $data['email'] ?? null;
        $password = $data['mdp'] ?? null;

        if (!$email || !$password) {
            return new JsonResponse(['error' => 'Email et mot de passe sont requis'], 400);
        }

        $user = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $email]);

        if (!$user) {
            return new JsonResponse(['error' => 'Mauvais identifiants'], 401);
        }

        if ($this->passwordHasher->isPasswordValid($user, $password)) {
            $session = $this->requestStack->getSession();
            $session->set('user_id', $user->getId());

            error_log('Session User ID: ' . $session->get('user_id'));
            error_log('test_var: ' . $session->get('test_var'));

            return new JsonResponse(['message' => 'Connexion réussie !', 'userId' => $user->getId()], 200);
        }

        else
        {
            return new JsonResponse(['error' => 'Mauvais identifiants'], 401);
        }
    }
}

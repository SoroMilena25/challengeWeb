<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class LoginController extends AbstractController
{
    #[Route('/connexion', name: 'app_login', methods: ['POST'])]
    public function login(Request $request, UserRepository $userRepository, UserPasswordHasherInterface $passwordHasher): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (!isset($data['email']) || !isset($data['password'])) {
            return new JsonResponse(['message' => 'Email et mot de passe requis'], 400);
        }

        // Cherche l'utilisateur par son email
        $user = $userRepository->findOneBy(['email' => $data['email']]);
        if (!$user) {
            return new JsonResponse(['message' => 'Utilisateur non trouvé'], 404);
        }

        // Vérifie si le mot de passe est correct
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

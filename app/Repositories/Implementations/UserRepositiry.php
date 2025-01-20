<?php


class UserRepository {
    private UserDao $userDao;

    public function __construct()
    {
        $this->userDao = new UserDao();
    }

    public function create(Utilisateur $user): Utilisateur
    {
        return $this->userDao->create($user);
    }


        
    public function findById(Utilisateur $user): ?Utilisateur
    {
        return $this->userDao->findById($user->getId());
    }


    
    public function findAll(): array
    {
        // var_dump($this->userDao->findAll());
        return $this->userDao->findAll();
    }

    
   



    
    public function update(Utilisateur $user)
    {
        // die($this->userDao->update($user));
        return $this->userDao->update($user);
    }
    


    
    public function delete(int $id)
    {
        return $this->userDao->delete($id);
    }


    


}



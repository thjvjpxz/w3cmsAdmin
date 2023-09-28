<?php

    class User
    {
        private int $id;
        private string $uname;
        private string $pword;
        private string $email;
        private DateTime $created_at;

        /**
         * @param int $id
         * @param string $uname
         * @param string $pword
         * @param string $email
         * @param DateTime $created_at
         */
        public function __construct(string $uname, string $pword, string $email)
        {
            $this->uname = $uname;
            $this->pword = $pword;
            $this->email = $email;
        }

        public function getId(): int
        {
            return $this->id;
        }

        public function getUname(): string
        {
            return $this->uname;
        }

        public function getPword(): string
        {
            return $this->pword;
        }

        public function getEmail(): string
        {
            return $this->email;
        }

        public function getCreatedAt(): DateTime
        {
            return $this->created_at;
        }


    }
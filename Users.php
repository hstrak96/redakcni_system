<?php
/**
 * Trida pro spravu uzivatelu
 */
class Users
{
    /**
     * data 1 uzivatele
     * @var array
     */
    protected $user = null;

    /**
     * data vsech uzivatelu
     * @var array
     */
    protected $users = null;

    /**
     * Nacte a vrati seznam vsech uzivatelu
     * @return array
     */
    public function fetchAll()
    {
        if ($this->users == null) {
            $users = array();
            $sqlUsers = mysql_query('
                SELECT 
                    login,
                    email
                FROM
                    login_redaktor                
            ');
            while ($row = mysql_fetch_assoc($sqlUsers)) {
                $users[] = $row;
            }
            mysql_free_result($sqlUsers);

            $this->users = $users;
        }

        return $this->users;
    }   
}
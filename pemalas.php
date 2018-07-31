<?php

/* Ini skrip buat ngisi & hapus database,
 * Gitu aja
 * Sid
 */

include 'application/config/creds.php';

class Pemalas {
    private $con;
    public function __construct() {
        global $cred_db_username;
        global $cred_db_password;
        $this->con = new mysqli('localhost', $cred_db_username, $cred_db_password, 'ynote');
        if ($this->con->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
    }

    private $user = 'joni';
    private $judul = 'Lorem Ipsum';
    private $tag = 'test';
    private $omong_kosong = <<<EOD
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tincidunt, lorem a congue tristique, 
nulla orci facilisis elit, faucibus pulvinar neque lorem at libero. Mauris bibendum leo nec faucibus 
consequat. Vivamus id sem eget elit facilisis pharetra dictum vel ligula. Fusce consequat sed orci nec 
gravida. Nam tincidunt risus sit amet ipsum gravida, ut commodo libero porta. Curabitur tempor ex ex, 
vitae sodales purus semper vel. Cras convallis ligula lectus, sit amet vulputate ligula rutrum non. 
Mauris a mi mi.</p>

EOD;
    public function membantai($tabel_users=FALSE) {
        $this->con->query("DELETE FROM posts");
        $this->con->query("DELETE FROM tags");
        if ($tabel_users) {
            $this->con->query($this->con, "DELETE FROM users WHERE user_role <> 'admin'");
        }
        $this->con->close();
    }

    public function mengisi_kehampaan($n=20) {
        for ($i=0; $i<$n; $i++) {
            $judul = $this->judul . $i;
            $this->con->query("INSERT INTO posts
                              (id_post, date_post, date_modified, title_post, content, author)
                              VALUES
                              (NULL, NOW(), NULL, '$judul', '$this->omong_kosong', '$this->user')");
            $id_post = $this->con->insert_id;
            $this->con->query("INSERT INTO tags
                              (id_post, tag)
                              VALUES ('$id_post', '$this->tag')");
            sleep(1);
        }
        $this->con->close();

    }
}

$bangke = new Pemalas;
// $bangke->membantai();
$bangke->mengisi_kehampaan();

?>

<a href="pemalas.php?sinting=bantai">Bantai</a>
<br>
<a href="pemalas.php?sinting=isi">Isi</a>
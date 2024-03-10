<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    include "../app/config/config.php";
    include "../app/Models/Usuario.php";
    include "../app/Models/Proyecto.php";
    include "../app/Models/RedSocial.php";
    include "../app/Models/Trabajo.php";
    include "../app/Models/CategoriaSkill.php";
    include "../app/Models/Skill.php";
    include "../lib/funciones.php";

    $datos = array("nombre"=>"laura", "email"=>"noodiophpal100por100@gmail.com", 
    "passwd"=>"root");

    echo "Clases sin instanciar <br/>";
    $sh_singleton1=Usuario::getInstancia();
    // $sh_singleton1->setNombre("Freddy");
    // $sh_singleton1->setEmail("freddyfazbear1996@gmail.com");
    // $sh_singleton1->setPassword("Admin1234");
    // $sh_singleton1->setToken(generarToken());
    // $sh_singleton1->set();
    $sh_singleton2=Proyecto::getInstancia();
    $sh_singleton3=RedSocial::getInstancia();
    // $sh_singleton3->setTitulo("Youtube");
    // $sh_singleton3->setURL("https://www.youtube.com");
    // $sh_singleton3->setUsuarioID(1);
    // $sh_singleton3->set();
    $sh_singleton4=Trabajo::getInstancia();
    // $sh_singleton4->setTitulo("Programador en Front-end");
    // $sh_singleton4->setDescripcion("");
    // $sh_singleton4->setFechaInicio(date("Y-m-d", strtotime("27-03-2018")));
    // $sh_singleton4->setFechaFin(date("Y-m-d", strtotime("28-04-2018")));
    // $sh_singleton4->setLogros(implode(",", ["Logro1", "kk2"]));
    // $sh_singleton4->setUsuarioID(1);
    // $sh_singleton4->set();
    $sh_singleton5=CategoriaSkill::getInstancia();
    // $sh_singleton5->setCategoria("Soft-Skills");
    // $sh_singleton5->set();
    $sh_singleton6=Skill::getInstancia();
    // $sh_singleton6->setHabilidades(implode(",", ["Trabajo en equipo", "Minuciosidad y limpieza"]));
    // $sh_singleton6->setCategoria("Soft-Skills");
    // $sh_singleton6->setUsuarioID(1);
    // $sh_singleton6->set();

    echo "<br/>Instanciando objetos<br/>";

    // $sh_singleton1->setNombre($datos["nombre"]);
    // $sh_singleton1->set($datos);
    $user=$sh_singleton1->get(2);
    // var_dump($user);
    $campos = ["nombre", "apellidos", "foto", "categorias_profesional", "email", "resumen_perfil"];
    foreach ($user[0] as $key => $value) {
        if (isset($value) && in_array($key, $campos)) {
            echo $key . ": " . $value . "<br/>";
        }
        if ($key == "cuenta_activa") {
            $active = ($value == 1) ? "Sí" : "No";
            echo "Cuenta Activa: " . $active . "<br/>";
        }
    }
    echo "<br/>";
    $datos=$sh_singleton2->get(3);
    $tecs=explode(",",$datos[0]["tecnologias"]);
    var_dump($datos);
    echo "<br/>";
    var_dump($tecs);

    echo "<br/>Token generado: ";
    echo generarToken();

?>
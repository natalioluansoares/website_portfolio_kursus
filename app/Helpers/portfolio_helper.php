<?php 
    function helperSistema()
    {
    $db   = \Config\Database::connect();

    $builder = $db->table('administrator');
    $builder->select('*');
    $builder->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 'kode_sistema', 'sistema','left');
    $builder->where('id_administrator', session('id_administrator'));
    $builder->where('sistema =', 'Administrator');

    $query = $builder->get()->getRow(); 
    return $query; 
    }

    function helperFunsionario()
    {
    $db   = \Config\Database::connect();

    $builder = $db->table('administrator');
    $builder->select('*');
    $builder->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 'kode_sistema', 'sistema','left');
    $builder->where('id_administrator', session('id_administrator'));
    $builder->where('sistema =', 'Administrasaun');

    $query = $builder->get()->getRow(); 
    return $query; 
    }
    function helperProfessores()
    {
    $db   = \Config\Database::connect();

     $builder = $db->table('administrator');
    $builder->select('*');
    $builder->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 'kode_sistema', 'sistema','left');
    $builder->where('id_administrator', session('id_administrator'));
    $builder->where('sistema =', 'Professores');

    $query = $builder->get()->getRow(); 
    return $query; 
    }
    function helperEstudante()
    {
    $db   = \Config\Database::connect();

     $builder = $db->table('estudante');
    $builder->select('*');
    $builder->join('sistema', 'estudante.sistema_estudante = sistema.id_sistema', 'kode_sistema', 'sistema','left');
    $builder->where('id_estudante', session('id_estudante'));
    $builder->where('sistema =', 'Estudantes');

    $query = $builder->get()->getRow(); 
    return $query; 
    }
    function helperEstudanteRegisto()
    {
    $db   = \Config\Database::connect();

     $builder = $db->table('estudante_registo');
    $builder->select('*');
    $builder->join('estudante', 'estudante_registo.conta_estudante_registo = estudante.id_estudante', 'naran_kompletos', 'loron_moris', 'image_estudante', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');
    $builder->join('sistema', 'estudante.sistema_estudante = sistema.id_sistema', 'kode_sistema', 'sistema','left');
    $builder->where('id_estudante_registo', session('id_estudante_registo'));
    $builder->where('sistema =', 'Estudantes');

    $query = $builder->get()->getRow(); 
    return $query; 
    }
?>
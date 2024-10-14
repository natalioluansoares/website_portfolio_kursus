<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSidebarAktivo extends Model
{
    protected $table            = 'direito_acesso ';
    protected $primaryKey       = 'id_direito_acesso ';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_direito_acesso','total_saldo','total_osan_tama','salario_funsionario','salario_professores','osan_impresta_funsionario','osan_impresta_professores','funsionario','professores','materia_professores','estudante','valores','absence','kategorio_materia','materia','kursus_projeito','classe','horario_kursus','horario_kursus_hotu','id_administrator_acesso'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getsidebar()
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('direito_acesso');

        $builder->join('menu_acesso', 'direito_acesso.id_administrator_acesso  = menu_acesso.id_menu_acesso', 
       'menu_profile', 'menu_finansa', 'menu_funsionario', 'menu_profesores', 'menu_estudante', 'menu_kategoria_materia', 'menu_kursus_projeito', 'menu_classe_horario', 'menu_sertifikado', 'left');

        $builder->join('administrator', 'menu_acesso.menu_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris','image_administrator', 'numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $builder->join('sistema', 'administrator.sistema_administrator  = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');

        $query = $builder->get()->getResult(); 
        return $query;
    }

    function sidebarPagination($num, $keyword = null)
    {
        $this->builder();
        $this->join('menu_acesso', 'direito_acesso.id_administrator_acesso  = menu_acesso.id_menu_acesso', 
       'menu_profile', 'menu_finansa', 'menu_funsionario', 'menu_profesores', 'menu_estudante', 'menu_kategoria_materia', 'menu_kursus_projeito', 'menu_classe_horario', 'menu_sertifikado', 'left');

        $this->join('administrator', 'menu_acesso.menu_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris','image_administrator', 'numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

         $this->join('sistema', 'administrator.sistema_administrator  = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');

        if ($keyword != '') {
            $this->like('naran_kompleto', $keyword);
        }
        $this->orderBy('id_menu_acesso', 'DESC');
        return [
            'menu' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }

    public function filtersidebar($num)
    {
        $request        = \Config\Services::request();
        $start          = $request->getGet('start');
        $end            = $request->getGet('end');

        $this->join('menu_acesso', 'direito_acesso.id_administrator_acesso  = menu_acesso.id_menu_acesso', 
       'menu_profile', 'menu_finansa', 'menu_funsionario', 'menu_profesores', 'menu_estudante', 'menu_kategoria_materia', 'menu_kursus_projeito', 'menu_classe_horario', 'menu_sertifikado', 'left');

        $this->join('administrator', 'menu_acesso.menu_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris','image_administrator', 'numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

         $this->join('sistema', 'administrator.sistema_administrator  = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');

        $this->where('data_materia >=', $start);
        $this->where('data_materia <=', $end);
        return [
            'menu' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }

    public function sidebaraktivo()
    {
        $this->join('menu_acesso', 'direito_acesso.id_administrator_acesso  = menu_acesso.id_menu_acesso', 
       'menu_profile', 'menu_finansa', 'menu_funsionario', 'menu_profesores', 'menu_estudante', 'menu_kategoria_materia', 'menu_kursus_projeito', 'menu_classe_horario', 'menu_sertifikado', 'left');

        $this->join('administrator', 'menu_acesso.menu_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris','image_administrator', 'numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

         $this->join('sistema', 'administrator.sistema_administrator  = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');

         $query = $this->findAll(); 
        return $query;
    }
}

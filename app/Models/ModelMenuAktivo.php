<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMenuAktivo extends Model
{
    protected $table            = 'menu_acesso';
    protected $primaryKey       = 'id_menu_acesso';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_menu_acesso','menu_profile', 'menu_finansa', 'menu_funsionario', 'menu_profesores', 'menu_estudante', 'menu_kategoria_materia', 'menu_kursus_projeito', 'menu_classe_horario', 'menu_sertifikado', 'menu_administrator'];

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

    

    public function getmenu()
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('menu_acesso');

        $builder->join('administrator', 'menu_acesso.menu_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris','image_administrator', 'numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

         $builder->join('sistema', 'administrator.sistema_administrator  = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');

        $query = $builder->get()->getResult(); 
        return $query;
    }

    function menuPagination($num, $keyword = null)
    {
        $this->builder();
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

    public function filtermenu($num)
    {
        $request        = \Config\Services::request();
        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
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

    public function menuaktivo()
    {
        $this->join('administrator', 'menu_acesso.menu_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris','image_administrator', 'numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

         $this->join('sistema', 'administrator.sistema_administrator  = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');

        $query = $this->findAll(); 
        return $query;
    }
}

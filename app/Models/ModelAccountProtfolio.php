<?php

namespace App\Models;

use CodeIgniter\Commands\Utilities\Publish;
use CodeIgniter\Model;

class ModelAccountProtfolio extends Model
{
    protected $table            = 'administrator';
    protected $primaryKey       = 'id_administrator';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['naran_primeiro', 'naran_ikus', 'naran_kompleto', 'email', 'sena', 'jenero', 'fatin_moris',
                                    'loron_moris','status_servisu', 'numero_telefone', 'numero_eleitural', 'aktivo administrator', 
                                    'sistema_administrator', 'image_administrator', 'valido_administrator'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'image_administrator'      => 'uploaded[image_administrator]|mime_in[image_administrator,image/jpg,image/jpeg,image/gif,image/png]|max_size[image_administrator,16384]'
    ];
    protected $validationMessages   = [
        'image_administrator' => [
        'uploaded' => 'Tenki Iha File Atu Upload',
        'mime_in' => 'File Extention Tenki Hanesan Foto',
        'max_size' => 'Ukuran File Maksimal 10 MB'
        ],
    ];
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

    public function cek_naran($kode, $id=null)
    {
        $this->db   = \Config\Database::connect();
        $this->table('administrator')->where('naran_kompleto', $kode);
        if ($id != null) {
            $this->table('administrator')->where('id_administrator !=', $id);
        }
        $nato = $this->get();
        return $nato;
    }
    public function cek_email($email, $id=null)
    {
        $this->db   = \Config\Database::connect();
        $this->table('administrator')->where('email', $email);
        if ($id != null) {
            $this->table('administrator')->where('id_administrator !=', $id);
        }
        $nato = $this->get();
        return $nato;
    }

    public function getadministrator()
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('administrator');
        $builder->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');
        $query = $builder->get()->getResult(); 
        return $query;
    }
    public function resultadministrator()
    {
        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');
        $query = $this->findAll();
        return $query;
    }
    public function rowadministrator()
    {
        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');
        $query = $this->findAll();
        return $query;
    }
    function administratorPagination($num, $keyword = null)
    {
        $this->builder();
        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');
        if ($keyword != '') {
            $this->like('kode_sistema', $keyword);
            $this->orLike('sistema', $keyword);
            $this->orLike('naran_kompleto', $keyword);
            $this->orLike('naran_primeiro', $keyword);
            $this->orLike('naran_ikus', $keyword);
            $this->orLike('status_servisu', $keyword);
            $this->orLike('jenero', $keyword);
        }
        $this->orderBy('id_administrator', 'DESC');
        return [
            'administrator' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }

    public function filteradministrator($num){
        $request        = \Config\Services::request();
        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');
        $this->where('data_administrator >=', $start);
        $this->where('data_administrator <=', $end);
        return [
            'administrator' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }

    public function administrator()
    {
        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');
        $query = $this->first(); 
        return $query;
    }

    public function administratorRow($id)
    {
        $this->select('*');
        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');
        $query = $this->getWhere(['id_administrator' => $id]);
         return $query;
    }
     
    public function updateAdministrator($id,$data)
    {
        $query = $this->db->table($this->table)->update($data, array('id_administrator' => $id));
        return $query;
    }
    public function hamosAdministrator($id)
    {
        $query = $this->db->table($this->table)->delete(array('id_administrator' => $id));
        return $query;
    }
}

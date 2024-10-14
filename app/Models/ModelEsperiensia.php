<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelEsperiensia extends Model
{
    protected $table            = 'esperiensia';
    protected $primaryKey       = 'id_esperiensia';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['fatin_esperiensia', 'loron_esperiensia', 'esperiensia_administrator', 'esperiensia', 'image_esperiensia', 'aktivo_esperiensia', 'lian_esperiensia'];

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
    public function getesperiensia()
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('esperiensia');
        $builder->join('administrator', 'esperiensia.esperiensia_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $query = $builder->get()->getResult(); 
        return $query;
    }
    function esperiensiaPagination($num, $keyword = null)
    {
        $this->builder();
        $this->join('administrator', 'esperiensia.esperiensia_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris','image_administrator', 'numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');
         $this->join('sistema', 'administrator.sistema_administrator  = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');
        if ($keyword != '') {
            $this->like('naran_kompleto', $keyword);
            $this->orLike('fatin_esperiensia', $keyword);
            $this->orLike('loron_esperiensia', $keyword);
            $this->orLike('numero_eleitural', $keyword);
        }
        $this->orderBy('id_esperiensia', 'DESC');
        return [
            'esperiensia' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function filteresperiensia($num){
        $this->builder();
        $this->join('administrator', 'esperiensia.esperiensia_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris','image_administrator', 'numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');
         $this->join('sistema', 'administrator.sistema_administrator  = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');
        $request        = \Config\Services::request();
        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
        $this->where('loron_esperiensia >=', $start);
        $this->where('loron_esperiensia <=', $end);
        return [
            'esperiensia' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function esperiensia()
    {
        
        $this->join('administrator', 'esperiensia.esperiensia_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');
        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');

        $query = $this->first(); 
        return $query;
    }
    public function esperiensiaRow($id)
    {
        $this->select('*');
        $this->join('administrator', 'esperiensia.esperiensia_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');
        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');
        $query = $this->getWhere(['id_esperiensia' => $id]);
         return $query;
    }
     
    public function updateEsperiensia($id,$data)
    {
        $query = $this->db->table($this->table)->update($data, array('id_esperiensia' => $id));
        return $query;
    }
    public function hamosEsperiensia($id)
    {
        $query = $this->db->table($this->table)->delete(array('id_esperiensia' => $id));
        return $query;
    }
}

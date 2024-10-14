<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAccountEstudante extends Model
{
    protected $table            = 'estudante';
    protected $primaryKey       = 'id_estudante';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
     protected $allowedFields    = ['naran_primeiro', 'naran_ikus', 'naran_kompletos', 'emails', 'sena', 'jenero', 'fatin_moris',
                                    'loron_moris','status_servisu', 'numero_telefone', 'numero_eleitural', 'aktivo_estudante', 
                                    'sistema_estudante', 'image_estudante', 'data_estudante', 'valido_estudante'];
    public function cek_naran($kode, $id=null)
    {
        $this->db   = \Config\Database::connect();
        $this->table('estudante')->where('naran_kompletos', $kode);
        if ($id != null) {
            $this->table('estudante')->where('id_estudante !=', $id);
        }
        $nato = $this->get();
        return $nato;
    }
    public function cek_email($email, $id=null)
    {
        $this->db   = \Config\Database::connect();
        $this->table('estudante')->where('emails', $email);
        if ($id != null) {
            $this->table('estudante')->where('id_estudante !=', $id);
        }
        $nato = $this->get();
        return $nato;
    }
    public function getestudante()
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('estudante');
        $builder->join('sistema', 'estudante.sistema_estudante = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');
        $query = $builder->get()->getResult(); 
        return $query;
    }
    function estudantePagination($num, $keyword = null)
    {
        $this->builder();
        $this->join('sistema', 'estudante.sistema_estudante = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');
        if ($keyword != '') {
            $this->like('kode_sistema', $keyword);
            $this->orLike('sistema', $keyword);
            $this->orLike('naran_kompletoss', $keyword);
            $this->orLike('naran_primeiro', $keyword);
            $this->orLike('naran_ikus', $keyword);
            $this->orLike('status_servisu', $keyword);
            $this->orLike('jenero', $keyword);
        }
        $this->orderBy('id_estudante', 'DESC');
        return [
            'estudante' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }

    public function filterestudante($num){
        $request        = \Config\Services::request();
        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
        $this->join('sistema', 'estudante.sistema_estudante = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');
        $this->where('data_estudante >=', $start);
        $this->where('data_estudante <=', $end);
        return [
            'estudante' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }

    public function estudante()
    {
        $this->join('sistema', 'estudante.sistema_estudante = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');
        $query = $this->first(); 
        return $query;
    }
    public function resultestudante()
    {
        $this->join('sistema', 'estudante.sistema_estudante = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');
        $query = $this->findAll(); 
        return $query;
    }

}

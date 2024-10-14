<?php

namespace Config;

use App\Filters\FilterAdministrator;
use App\Filters\FilterEstudante;
use App\Filters\FilterFunsionario;
use App\Filters\FilterProfessores;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array<string, class-string|list<class-string>> [filter_name => classname]
     *                                                     or [filter_name => [classname1, classname2, ...]]
     */
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'filteradministrator' =>FilterAdministrator::class,
        'filterfunsionario' =>FilterFunsionario::class,
        'filterprofessores' =>FilterProfessores::class,
        'filterestudante'   =>FilterEstudante::class
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array<string, array<string, array<string, string>>>|array<string, list<string>>
     */
    public array $globals = [
        'before' => [
            // 'honeypot',
            'csrf',
            // 'invalidchars',
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
            'filteradministrator' => ['except' =>['*/homeadministrator', '*/sistema', '*/sistema/*', '*/accountportfolio', 
                                    '*/accountportfolio/*', '*/funsionarioaccount', '*/funsionarioaccount/*', '*/categorio', 
                                    '*/categorio/*', '*/homeportfolio', '*/professores', '*/professores/*',  '*/teachersaccount', '*/teachersaccount/*', '*/funsionario', '*/funsionario/*', '*/esperiensia/*', '*/esperiensia',
                                    '*/materia/*', '*/materia', '*/categoriobackendfrontend/*', '*/categoriobackendfrontend', '*/projeitobackend/*', '*/projeitobackend', '*/projeitofrontend/*', '*/projeitofrontend', '*/room/*', '*/room',
                                    '*/saldoportfolio/*', '*/saldoportfolio', '*/saldodonatorprivado','*/saldodonatorprivado/*', '*/osantamaprivado','*/osantamaprivado/*', '*/accountestudante',  '*/accountestudante/*', '*/aktivosistema/*','*/aktivosistema', '*/salarioprofessoresportfolio', '*/salarioprofessoresportfolio/*','*/salariofunsionarioportfolio', '*/salariofunsionarioportfolio/*','*/imprestaosanfunsionarioportfolio', '*/imprestaosanfunsionarioportfolio/*','*/imprestaosanprofessoresportfolio', '*/imprestaosanprofessoresportfolio/*','*/horarioportfolio', '*/horarioportfolio/*', '*/detailhorarioportfolio','*/detailhorarioportfolio/*', '/*materiaprofessoresportfolio', '/*materiaprofessoresportfolio/*', '*/preparasaunmateriaportfolio', '*/preparasaunmateriaportfolio/*', '*/menuaktivo', '*/menuaktivo/*', '*/sidebaraktivo', '*/sidebaraktivo/*', '*/inputupdatedelete', '*/inputupdatedelete/*', '*/totalsaldoestudante', '*/totalsaldoestudante/*', '/*osantamaestudanteportfolio','*/osantamaestudanteportfolio/*', '/*osansai','*/osansai/*', '/*saldoosansai','*/saldoosansai/*', '/*materiakursusportfolio','*/materiakursusportfolio/*', '/*subsidioportfolio','*/subsidioportfolio/*',
            ]],
            'filterfunsionario' => ['except' =>['*/homefunsionario', '*/profilefunsionario', '*/profilefunsionario/*', 
                                    '*/totalsaldofunsionario', '*/saldodonatorfunsionario', '*/saldodonatorfunsionario/*', '*/employee', '*/employee/*', '*/teacher', '*/teacher/*', '*/estudanteregisto', '*/estudanteregisto/*', '*/sciensiecategoryfunsionario', '*/sciensiecategoryfunsionario/*', '*/sciensiefunsionario', '*/sciensiefunsionario/*', '*/projeitocategoriofunsionario', '*/projeitocategoriofunsionario/*', '*/roomfunsionario', '*/roomfunsionario/*','*/horariofunsionario', '*/horariofunsionario/*','*/materiaprofessores', '*/materiaprofessores/*', '*/preparasaunmateria', '*/preparasaunmateria/*', '*/horarioprofessores', '*/horarioprofessores/*', '*/detailhorariofunsionario','*/detailhorariofunsionario/*','*/salariofunsionario','*/salariofunsionario/*', '*/salarioprofessores','*/salarioprofessores/*', '*/imprestaosanfunsionario', '*/imprestaosanfunsionario/*' ,'*/imprestaosanprofessores', '*/imprestaosanprofessores/*', '*/valoresfunsionario', '*/valoresfunsionario/*', '*/materiakursus', '*/materiakursus/*', '*/subsidiofunsionario', '*/subsidiofunsionario/*'
            ]],

            'filterprofessores' => ['except' =>['*/homefunsionario', '*/profilefunsionario', '*/profilefunsionario/*', 
                                    '*/totalsaldofunsionario', '*/saldodonatorfunsionario', '*/saldodonatorfunsionario/*', '*/employee', '*/employee/*', '*/teacher', '*/teacher/*', '*/estudanteregisto', '*/estudanteregisto/*', '*/sciensiecategoryfunsionario', '*/sciensiecategoryfunsionario/*', '*/sciensiefunsionario', '*/sciensiefunsionario/*', '*/projeitocategoriofunsionario', '*/projeitocategoriofunsionario/*', '*/roomfunsionario', '*/roomfunsionario/*','*/horariofunsionario', '*/horariofunsionario/*','*/materiaprofessores', '*/materiaprofessores/*', '*/preparasaunmateria', '*/preparasaunmateria/*', '*/horarioprofessores', '*/horarioprofessores/*', '*/detailhorariofunsionario','*/detailhorariofunsionario/*','*/salariofunsionario','*/salariofunsionario/*', '*/salarioprofessores','*/salarioprofessores/*', '*/imprestaosanfunsionario', '*/imprestaosanfunsionario/*' ,'*/imprestaosanprofessores', '*/imprestaosanprofessores/*', '*/valoresfunsionario', '*/valoresfunsionario/*', '*/materiakursus', '*/materiakursus/*', '*/subsidiofunsionario', '*/subsidiofunsionario/*'
            ]],

            'filterestudante' => ['except' =>['*/homeestudante','*/homeestudante/*',  '*/profileestudante', '*/profileestudante/*', '*/horarioestudante', '*/horarioestudante/*', '*/perguntasestudante', '*/perguntasestudante/*', '*/valoresestudante', '*/valoresestudante/*', '*/propinasestudante', '*/propinasestudante/*'
            ]],
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don't expect could bypass the filter.
     */
    public array $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     */
    public array $filters = [
        'filteradministrator' => ['before' =>[ '*/homeadministrator',  '*/sistema', '*/sistema/*', '*/accountportfolio', 
                                '*/accountportfolio/*', '*/funsionarioaccount', '*/funsionarioaccount/*', '*/categorio',
                                 '*/categorio/*', '*/professores', '*/professores/*', '*/teachersaccount', '*/teachersaccount/*','*/funsionario', '*/funsionario/*', '*/esperiensia/*', '*/esperiensia', '*/materia/*', '*/materia',
                                  '*/categoriobackendfrontend/*', '*/categoriobackendfrontend', '*/projeitobackend/*', '*/projeitobackend','*/projeitofrontend/*', '*/projeitofrontend','*/room/*', '*/room', '*/saldoportfolio/*', '*/saldoportfolio','*/saldodonatorprivado','*/saldodonatorprivado/*', '*/osantamaprivado','*/osantamaprivado/*', '*/accountestudante','*/accountestudante/*','*/aktivosistema/*','*/aktivosistema','*/salarioprofessoresportfolio', '*/salarioprofessoresportfolio/*','*/salariofunsionarioportfolio', '*/salariofunsionarioportfolio/*','*/imprestaosanfunsionarioportfolio', '*/imprestaosanfunsionarioportfolio/*'
                                  ,'*/imprestaosanprofessoresportfolio', '*/imprestaosanprofessoresportfolio/*','*/horarioportfolio', '*/horarioportfolio/*', '*/detailhorarioportfolio','*/detailhorarioportfolio/*', '/*materiaprofessoresportfolio', '/*materiaprofessoresportfolio/*', '*/preparasaunmateriaportfolio', '*/preparasaunmateriaportfolio/*','*/menuaktivo', '*/menuaktivo/*', '*/sidebaraktivo', '*/sidebaraktivo/*','*/inputupdatedelete', '*/inputupdatedelete/*', '*/totalsaldoestudante', '*/totalsaldoestudante/*','/*osantamaestudanteportfolio','*/osantamaestudanteportfolio/*','/*osansai','*/osansai/*', '/*saldoosansai','*/saldoosansai/*', '/*materiakursusportfolio','*/materiakursusportfolio/*', '/*subsidioportfolio','*/subsidioportfolio/*',
        ]],
        
        'filterfunsionario' => ['before' =>[ '*/homefunsionario', '*/profilefunsionario', '*/profilefunsionario/*', 
                                '*/totalsaldofunsionario', '*/saldodonatorfunsionario', '*/saldodonatorfunsionario/*', '*/employee', '*/employee/*', '*/teacher', '*/teacher/*', '*/estudanteregisto', '*/estudanteregisto/*', '*/sciensiecategoryfunsionario', '*/sciensiecategoryfunsionario/*','*/sciensiefunsionario', '*/sciensiefunsionario/*', '*/projeitocategoriofunsionario', '*/projeitocategoriofunsionario/*','*/roomfunsionario', '*/roomfunsionario/*','*/horariofunsionario', '*/horariofunsionario/*','*/materiaprofessores', '*/materiaprofessores/*', '*/preparasaunmateria', '*/preparasaunmateria/*', '*/horarioprofessores', '*/horarioprofessores/*', '*/detailhorariofunsionario','*/detailhorariofunsionario/*','*/salariofunsionario','*/salariofunsionario/*', '*/salarioprofessores','*/salarioprofessores/*','*/imprestaosanfunsionario', '*/imprestaosanfunsionario/*' ,'*/imprestaosanprofessores', '*/imprestaosanprofessores/*', '*/valoresfunsionario', '*/valoresfunsionario/*', '*/materiakursus', '*/materiakursus/*', '*/subsidiofunsionario', '*/subsidiofunsionario/*'
        ]],

        'filterprofessores' => ['before' =>[ '*/homefunsionario', '*/profilefunsionario', '*/profilefunsionario/*', 
                                '*/totalsaldofunsionario', '*/saldodonatorfunsionario', '*/saldodonatorfunsionario/*', '*/employee', '*/employee/*', '*/teacher', '*/teacher/*', '*/estudanteregisto', '*/estudanteregisto/*', '*/sciensiecategoryfunsionario', '*/sciensiecategoryfunsionario/*','*/sciensiefunsionario', 
                                '*/sciensiefunsionario/*', '*/projeitocategoriofunsionario', '*/projeitocategoriofunsionario/*','*/roomfunsionario', '*/roomfunsionario/*','*/horariofunsionario', '*/horariofunsionario/*','*/materiaprofessores', '*/materiaprofessores/*', '*/preparasaunmateria', '*/preparasaunmateria/*', '*/horarioprofessores', '*/horarioprofessores/*', '*/detailhorariofunsionario','*/detailhorariofunsionario/*','*/salariofunsionario','*/salariofunsionario/*', '*/salarioprofessores','*/salarioprofessores/*','*/imprestaosanfunsionario', '*/imprestaosanfunsionario/*' ,'*/imprestaosanprofessores', '*/imprestaosanprofessores/*', '*/valoresfunsionario', '*/valoresfunsionario/*', '*/materiakursus', '*/materiakursus/*', '*/subsidiofunsionario', '*/subsidiofunsionario/*'
        ]],

        'filterestudante' => ['before' =>['*/homeestudante','*/homeestudante/*',  '*/profileestudante', '*/profileestudante/*',  '*/horarioestudante', '*/horarioestudante/*', '*/perguntasestudante', '*/perguntasestudante/*', '*/valoresestudante', '*/valoresestudante/*'
        ]],
    ];
}

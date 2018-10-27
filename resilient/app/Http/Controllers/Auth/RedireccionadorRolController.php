<?php

namespace App\Http\Controllers\Auth;

use App\AcudienteInfante;
use App\Infante;
use App\User;

const REGISTRO_SIN_DATOS_ACUDIENTE = 1;
const REGISTRO_COMPLETO = 2;
const REGISTRO_NINO_COMPLETO = 3;
const EN_PRETEST = 4;
const EN_ESCALAP2 = 5;
const EN_ESCALA_WALNIG_Y_YOUND = 6;
const EN_DESARROLLO_ACTIVIDADES = 7;
const EN_POSTEST = 8;
const FINALIZADO = 10;
const ACTIVO_SIN_REQUERIMIENTOS = 0;
const INACTIVO = 9;


class RedireccionadorRolController
{
    public static function redirectTo(){

        $user  = User::find(auth()->id());

        switch ($user->id_estado){
            case REGISTRO_SIN_DATOS_ACUDIENTE:{
                return redirect()->route('/datoscuidador');
                break;
            }
            case REGISTRO_NINO_COMPLETO:{
                return redirect()->route('/pretest0');
                break;
            }
            case EN_PRETEST:{
                return redirect()->route('/pretest0');
                break;
            }
            case EN_POSTEST:{
                return redirect()->route('/postest');
                break;
            }
            case EN_ESCALAP2:{
                $user = User::find(auth()->id());
                $acudienteinfante = AcudienteInfante::whereRaw('id = (select max(`id`) from acudiente_infante where Id_Acudiente = ?)', $user->cuidador->Id_Acudiente)->first();
                return redirect()->route('escalap2.id', $acudienteinfante->infante->Id_Infante);
                break;
            }
            case EN_ESCALA_WALNIG_Y_YOUND:{
                return redirect()->route('/datos-escala');
                break;
            }
            case REGISTRO_COMPLETO:{
                return redirect()->route('/menuCuidador');
                break;
            }
            case EN_DESARROLLO_ACTIVIDADES: {
                return redirect()->route('/menuCuidador');
                break;
            }
            case ACTIVO_SIN_REQUERIMIENTOS:{
                return redirect()->route('/menuCuidador');
                break;
            }
            case FINALIZADO:{
                return redirect()->route('/menuCuidador');
                break;
            }
            case INACTIVO:{
                return redirect()->route('/menuCuidador');
                break;
            }
            default:{
                return redirect()->route('/menuCuidador');
            }

        }
    }
}

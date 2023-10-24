<?php
  
namespace App\Http\Livewire;

use App\Mail\landing\RegistroMail;
use App\Models\Calculadora;
use App\Models\Empresas;
use App\Models\Solicitud_Credito;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use Livewire\Component;
use Livewire\WithFileUploads;
use Monolog\Processor\UidProcessor;

class wizard extends Component
{
    use WithFileUploads;
    public $currentStep = 1;

    /*first step */
    public $nombre, $curp;
    /* Fecha año bisiesto */
    public $dia,$mes,$year,$limite=31;

    public $empresa_trabajo, $antiguedad,$rama_empresa, $banco_nomina;
    /*Second step */
    public $email, $password, $password_confirmation, $confirmacion;
    /*Three step*/
    public $telefono_contacto, $calle, $numero,$num_int, $colonia,$cp,$municipio,$estado;

    /*Four step*/
    
    public $ine_frente; 
    public $ine_reverso; 
    public $comp_dom; 
    public $foto_cine;
    public $acepto;
    /*Mensajes de error o exito*/
    public $successMessage = '';
    public $errorMessage = '';
    
    /*Datos Calculadora*/
    public $prestamo = '';
    public $tiempo = '';
    public $trabajo = '';
    public $ingreso = '';
    public $nomina = '';
    public $credito = '';
    public $id_us;
    public $nombre_usuario = '';

    public function index($id){
        
        $con = DB::select("SELECT * FROM calculadoras WHERE id=?",[$id]);
        $nombre_usuario = $con[0]->nombre;

        return view('livewire.registroJCST.default', ['usuario_name'=>$nombre_usuario]);
    }    

    public function mount($id_user){
        $this->id_us = $id_user;
    }

    public function render()
    {   
        $year_actual = date('y');
        $year_adult = ($year_actual-18)+2000;
        $year_limit = (2000+$year_actual)-79;
        $empresas = Empresas::get();
        return view('livewire.registroJCST.wizard', ['empresas' => $empresas,'year_adult'=>$year_adult, 'year_limit'=>$year_limit]);
    }

    public function updatedMes(){
            $this->reset('limite');
            if(empty($this->year%4)){
                if($this->mes == '02'){
                    $this->limite = 29;
                }
            }else{
                if($this->mes== '02'){
                    $this->limite = 28;
                }else{
                    $this->limite = 31;
                }
            }
    }

    public function updatedYear(){
        $this->reset(['mes','limite']);
    }
  
    public function firstStepSubmit()
    {
        $successMessage = '';
        $errorMessage = '';

        $validatedData = $this->validate([
                'dia' => 'required',
                'mes'=> 'required',
                'year' => 'required',
                'empresa_trabajo' => ['required','min:5' ,'max:40','regex:/^[a-zA-ZáéíóúüÜÁÉÍÓÚ.,\s]+$/u'],
                'antiguedad' => 'required',
                'rama_empresa'=> 'required|min:5|max:250',
                'banco_nomina'=> 'required|min:3|max:35',
                'curp' => ['required','min:18','max:18','unique:users,curp','regex:/^([A-Z]{4})(\d{6})([HM])([A-Z]{5})(\d{2})$/'],
            ],
            [
                'curp.unique' => 'El CURP ya esta registrado, por favor verificalo.'
            ]
        );    

        if(Calculadora::where('nombre','=',$this->id_us)->exists()){

            $this->currentStep = 2;
            $this->reset(['successMessage','errorMessage']);
                    
            
        }else{
            $this->errorMessage = "No has llenado la calculadora previamente o tus datos son erroneos.";
        }
        
        
        
    }

    public function secondStepSubmit()
    {
        $successMessage = '';
        $errorMessage = '';
        /*Datos de Inicio de sesión
        Telefono, email, contraseña,
        */ 
        $validatedData = $this->validate([
            'telefono_contacto' => 'required|numeric|digits_between:10,10',
            'email' => 'unique:users,email|regex:/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i|unique:users|required',
            'password' => [
                'required',
                'confirmed',
                'max:20',
                'min:8',
                'regex:/^[A-Za-z0-9]+$/u'
            ]
            ]);
        
        $this->currentStep = 3;
        
    }

    public function submitForm()
    {   
        $validatedData = $this->validate(
            [
            'acepto' => 'accepted',
            'ine_frente' => 'required|mimes:jpg,png|max:2000',
            'ine_reverso' => 'required|mimes:jpg,png|max:2000',
            'comp_dom' => 'required|mimes:jpg,png|max:2000',
            'foto_cine' => 'required|mimes:jpg,png|max:2000',
            ],
            [
                'acepto.accepted'=> 'Tienes que aceptar los terminos y condiciones para poder continuar.',
                'ine_frente.max' => 'Hubo un problema al subir la imagen, revisa tu conexión o que el peso de tus imagenes no rebase de 2MB',
                'ine_reverso.max' => 'Hubo un problema al subir la imagen, revisa tu conexión o que el peso de tus imagenes no rebase de 2MB',
                'comp_dom.max' => 'Hubo un problema al subir la imagen, revisa tu conexión o que el peso de tus imagenes no rebase de 2MB',
                'foto_cine.max' => 'Hubo un problema al subir la imagen, revisa tu conexión o que el peso de tus imagenes no rebase de 2MB',
            ],
        );
        
        $nombre_ine_frente = 'INE_FRENTE-'.Str::slug($this->id_us).'.'.$this->ine_frente->getClientOriginalExtension();
        $nombre_ine_reverso = 'INE_REVERSO-'.Str::slug($this->id_us).'.'.$this->ine_reverso->getClientOriginalExtension();
        $nombre_comp_dom = 'COMP_COM-'.Str::slug($this->id_us).'.'.$this->comp_dom->getClientOriginalExtension();
        $nombre_foto_cine = 'FOTO_CON_INE-'.Str::slug($this->id_us).'.'.$this->foto_cine->getClientOriginalExtension();
        
        /*$ruta1= $this->ine_frente->storeAs("posts/",$nombre_ine_frente,'public_posts',0644);
        $ruta2= $this->ine_reverso->storeAs("posts/",$nombre_ine_reverso,'public_posts',0644);
        $ruta3= $this->comp_dom->storeAs("posts/",$nombre_comp_dom,'public_posts',0644);
        $ruta4= $this->foto_cine->storeAs("posts/",$nombre_foto_cine,'public_posts',0644);*/
        //Ine Frente
        $path_if = public_path('posts'.'/'.$nombre_ine_frente);
        $comp_if = Image::make($this->ine_frente->getRealPath());
        $comp_if->save($path_if,40);
        //Ine Reverso
        $path_ir = public_path('posts'.'/'.$nombre_ine_reverso);
        $comp_ir = Image::make($this->ine_reverso->getRealPath());
        $comp_ir->save($path_ir,40);
        //Comprobante de Domicilio
        $path_comp_d = public_path('posts'.'/'.$nombre_comp_dom);
        $comp_comp_d = Image::make($this->comp_dom->getRealPath());
        $comp_comp_d->save($path_comp_d,40);
        //Foto con INE
        $path_fc = public_path('posts'.'/'.$nombre_foto_cine);
        $comp_fc = Image::make($this->foto_cine->getRealPath());
        $comp_fc->save($path_fc,40);



        $password = Hash::make($this->password);
        $consulta = DB::select("SELECT * FROM calculadoras WHERE nombre= ?",[$this->id_us]);
        $fecha_nacimiento = $this->year.'-'.$this->mes.'-'.$this->dia;
        $newuser = User::create([
            'nombre' => $this->id_us,
            'curp' => $this->curp,
            'fecha_nacimiento' => $fecha_nacimiento,
            'empresa_trabajo' => $this->empresa_trabajo,
            'antiguedad' => $this->antiguedad,
            'rama_empresa' => $this->rama_empresa,
            'banco_nomina' => $this->banco_nomina,
            'telefono_contacto' => $this->telefono_contacto,
            'email' => $this->email,
            'direccion' => null,
            'password' => $password,
            'ine_frente' => '/posts'.'/'.$nombre_ine_frente,
            'ine_reverso' => '/posts'.'/'.$nombre_ine_reverso,
            'comp_dom' => '/posts'.'/'.$nombre_comp_dom,
            'foto_cine' => '/posts'.'/'.$nombre_foto_cine,
            'prestamo' =>  $consulta[0]->prestamo,
            'tiempo' => $consulta[0]->tiempo,
            'trabajo' => $consulta[0]->trabajo,
            'ingreso' => $consulta[0]->ingreso,
            'nomina' => $consulta[0]->nomina,
            'credito' => $consulta[0]->credito,
        ]);
        $this->enviarsolicitud($newuser->id,0);
        
        
        if(DB::table('calculadoras')->where('nombre', '=', $this->id_us)->first() !=null){
                $consulta_cal = DB::select("SELECT * FROM calculadoras WHERE nombre= ?",[$this->id_us]);
                $id_con = $consulta_cal[0]->id;
                $calculadora = Calculadora::findOrFail($id_con);
                $calculadora->delete();
                $credenciales = [ 'email' => $this->email, 'password' => $this->password];
                if(Auth::attempt($credenciales)){
                    $datos = ['email' => $this->email, 'password'=> $this->password];
                    $this->enviarcorreo($datos);
                    return redirect()->route('dashboard');
                }else{
                    return "Ocurrio un error, Login";
                } 
                $this->clearForm();
        }else{
            dd('error calculadora');
        }
    }
    
    public function submitFormsinIMG()
    {  
        $validatedData = $this->validate(
            ['acepto' => 'accepted'],
            ['acepto.accepted'=> 'Tienes que aceptar los terminos y condiciones para poder continuar.']
        );

            $password = Hash::make($this->password);
            $consulta = DB::select("SELECT * FROM calculadoras WHERE nombre= ?",[$this->id_us]);
            $fecha_nacimiento = $this->year.'-'.$this->mes.'-'.$this->dia;
            $newuser =User::create([
                'nombre' => $this->id_us,
                'curp' => $this->curp,
                'fecha_nacimiento' => $fecha_nacimiento,
                'empresa_trabajo' => $this->empresa_trabajo,
                'antiguedad' => $this->antiguedad,
                'rama_empresa' => $this->rama_empresa,
                'banco_nomina' => $this->banco_nomina,
                'telefono_contacto' => $this->telefono_contacto,
                'email' => $this->email,
                'password' => $password,
                'direccion' => null,
                'ine_frente' => null,
                'ine_reverso' => null,
                'comp_dom' =>  null,
                'foto_cine' => null,
                'prestamo' =>  $consulta[0]->prestamo,
                'tiempo' => $consulta[0]->tiempo,
                'trabajo' => $consulta[0]->trabajo,
                'ingreso' => $consulta[0]->ingreso,
                'nomina' => $consulta[0]->nomina,
                'credito' => $consulta[0]->credito,
            ]);
            $this->enviarsolicitud($newuser->id,1);
            
            if(DB::table('calculadoras')->where('nombre', '=', $this->id_us)->first() !=null){

                $consulta_cal = DB::select("SELECT * FROM calculadoras WHERE nombre= ?",[$this->id_us]);
                $id_con = $consulta_cal[0]->id;
                $calculadora = Calculadora::findOrFail($id_con);
                $calculadora->delete();
                /*inicio de session*/
                $credenciales = [ 'email' => $this->email, 'password' => $this->password];
                if(Auth::attempt($credenciales)){
                    $datos = ['email' => $this->email, 'password'=> $this->password];
                    $this->enviarcorreo($datos);
                    return redirect()->route('dashboard');
                }else{
                    return "Ocurrio un error, Login";
                } 
                $this->clearForm();
            }else{
                dd('error calculadora');
            }
    }

    public function enviarsolicitud($id,$opcion){
        $fecha = Carbon::now();
        $fecha = $fecha->format('Y-m-d');
        if($opcion==1){
            //Falta información por eso opcion 3 en documentación
            $consulta = DB::select("SELECT * FROM calculadoras WHERE nombre= ?",[$this->id_us]);
            Solicitud_Credito::create([
            'monto'=> $consulta[0]->prestamo,
            'user_id'=>$id,
            'estado'=> '1',
            'mensaje' => 'Documentación faltante, favor de subir la documentación para continuar con el proceso.',
            'documentacion' => 3,
            'fecha_solicitud' => $fecha
            ]);
        }else{
            $consulta = DB::select("SELECT * FROM calculadoras WHERE nombre= ?",[$this->id_us]);
            Solicitud_Credito::create([
            'monto'=> $consulta[0]->prestamo,
            'user_id'=>$id,
            'estado'=> '0',
            'documentacion' => null,
            'fecha_solicitud' => $fecha
            ]);
        }
        
    }

    public function enviarcorreo($datos){
        $correo = new RegistroMail($datos);
        Mail::to($this->email)->send($correo);
        return redirect()->route('dashboard');
    }

    public function back($step)
    {
        $this->currentStep = $step;    
    }
  
    public function clearForm()
    {
        $this->nombre=''; 
        $this->curp=''; 
        $this->dia='';  
        $this->mes='';
        $this->empresa_trabajo='';  
        $this->rama_empresa=''; 
        $this->banco_nomina=''; 
        $this->telefono_contacto ='';  
        $this->email='';  
        $this->password =''; 
        $this->password=''; 
        $this->ine_frente=''; 
        $this->ine_reverso=''; 
        $this->comp_dom=''; 
        $this->foto_cine='';
        
    }

}
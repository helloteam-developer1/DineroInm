<?php

namespace App\Http\Livewire\AppCliente;

use App\Models\Buzon;
use App\Models\Credito;
use App\Models\Solicitud_Credito;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Livewire\Component;
use Livewire\WithFileUploads;


class Documentacion extends Component
{
    use WithFileUploads;
    public $ine_frente;
    public $ine_reverso;
    public $comp_dom;
    public $foto_cine;
    public $successMessage = '';
    public $info = '';
    
    public function render()
    {
        $credito = Credito::select(['estado'])->where('user_id','=',Auth::user()->id)->orderby('created_at','desc')->first();
        if(!empty($credito)){
            if($credito->estado==1 || $credito->estado==0){
                return view('livewire.app-cliente.documentacion',['documentacion'=>1]);            
            }else{
                return view('livewire.app-cliente.documentacion',['documentacion'=>4]);            
            }
        }else{
            $solicitud  = Solicitud_Credito::select(['documentacion'])->where('user_id','=',Auth::user()->id)->first();
            if(!empty($solicitud)){    
                return view('livewire.app-cliente.documentacion',['documentacion'=>$solicitud->documentacion]);  
            }else{
                return view('livewire.app-cliente.documentacion',['documentacion'=>null]);    
            }
        }
       
        
    }

    public function subirIMG(){
        $nombre = Auth::user()->nombre;
        $id = Auth::user()->id;
        
    
        if($this->ine_frente==null && $this->ine_reverso==null && $this->comp_dom==null && $this->foto_cine==null){
            $this->addError('img', 'Tienes que adjuntar uno o mas archivos para subir.');
        }else{
            if($this->ine_frente){
                //valido que sea img y que no pese mas de 2MB
                $validatedData = $this->validate([
                    'ine_frente' => 'mimes:jpg,png,jpeg|max:2000',
                    ],
                    [
                        'ine_frente.mimes' => 'La foto INE FRETE debe ser jpg,png,jpeg' , 
                        'ine_frente.max' => 'La foto INE FRETE no debe pesar mas de 2MB' ,
                    ]
                );
                if(Auth::user()->ine_frente!=null){
                    $file = Auth::user()->ine_frente;
                    if(Storage::disk('public_posts')->exists($file)){
                        Storage::disk('public_posts')->delete($file);
                    }    
                }  
                //Genero el nombre nuevo de la imagen con la extensión original
                $nombre_ine_frente = 'INE_FRENTE'.Str::slug($nombre).'.'.$this->ine_frente->getClientOriginalExtension();
                //Especifico la ruta para guardar la imagen para intervention image
                $path_if = public_path('posts'.'/'.$nombre_ine_frente);
                //Genero la nueva imagen con intervention image donde sea que este almacenada
                $comp_if = Image::make($this->ine_frente->getRealPath());
                //guardo la imagen con la ruta especificada arriba y la comprimo al 40%
                $comp_if->save($path_if,40);
                //Cambio la ruta de la imagen nueva en la base de datos
                $cambio = User::where('id','=',$id)->update(['ine_frente'=>'posts/'.$nombre_ine_frente]);
            }

            
            if($this->ine_reverso){
                $validatedData = $this->validate(
                    [            
                        'ine_reverso' => 'mimes:jpg,png,jpeg|max:2000',   
                    ],
                    [
                        'ine_reverso.mimes' => 'La foto INE REVERSO debe ser jpg,png,jpeg', 
                        'ine_reverso.max' => 'La foto INE REVERSO no debe pesar mas de 2MB', 
                    ]
                );
                //Valido si el usuario tiene un registro
                if(Auth::user()->ine_frente!=null){
                    $file = Auth::user()->ine_reverso;
                    if(Storage::disk('public_posts')->exists($file)){
                        //Si existe el archivo lo elimino
                        Storage::disk('public_posts')->delete($file);
                    }
                }               
                 //Genero el nombre nuevo de la imagen con la extensión original
                 $nombre_ine_reverso = 'INE_REVERSO'.Str::slug($nombre).'.'.$this->ine_reverso->getClientOriginalExtension();
                 //Especifico la ruta para guardar la imagen para intervention image
                 $path_ir = public_path('posts'.'/'.$nombre_ine_reverso);
                 //Genero la nueva imagen con intervention image donde sea que este almacenada
                 $comp_ir = Image::make($this->ine_reverso->getRealPath());
                 //guardo la imagen con la ruta especificada arriba y la comprimo al 40%
                 $comp_ir->save($path_ir,40);
                 //Cambio la ruta de la imagen nueva en la base de datos
                 $cambio = User::where('id','=',$id)->update(['ine_reverso'=>'posts/'.$nombre_ine_reverso]);
            }
            
            if($this->comp_dom){
                $validatedData = $this->validate([            
                    'comp_dom' => 'mimes:jpg,png,jpeg|max:2000',
                ],
                [
                    'comp_dom.mimes' => 'El COMPROBANTE DE DOMICILIO debe ser jpg,png,jpeg',
                    'comp_dom.max' => 'El COMPROBANTE DE DOMICILIO no debe pesar mas de 2MB'
                ]);
                if(Auth::user()->comp_dom!=null){
                    $file = Auth::user()->comp_dom;
                    if(Storage::disk('public_posts')->exists($file)){
                        Storage::disk('public_posts')->delete($file);
                    }
                }
                //Genero el nombre nuevo de la imagen con la extensión original
                $nombre_comp_dom = 'COMP_DOM'.Str::slug($nombre).'.'.$this->comp_dom->getClientOriginalExtension();
                //Especifico la ruta para guardar la imagen para intervention image
                $path_comp = public_path('posts'.'/'.$nombre_comp_dom);
                //Genero la nueva imagen con intervention image donde sea que este almacenada
                $comp_comp = Image::make($this->comp_dom->getRealPath());
                //guardo la imagen con la ruta especificada arriba y la comprimo al 40%
                $comp_comp->save($path_comp,40);
                //Cambio la ruta de la imagen nueva en la base de datos
                $cambio = User::where('id','=',$id)->update(['comp_dom'=>'posts/'.$nombre_comp_dom]);
            }

            if($this->foto_cine){
                $validatedData = $this->validate([            
                    'foto_cine' => 'mimes:jpg,png,jpeg|max:2000',
                ],
                [   
                    'foto_cine.mimes' => 'La foto FOTO CON INE debe ser jpg,png,jpeg',
                    'foto_cine.max' => 'La foto FOTO CON INE no debe pesar mas de 2MB',
                ]);
                if(Auth::user()->foto_cine!=null){
                    $file = Auth::user()->foto_cine;
                    if(Storage::disk('public_posts')->exists($file)){
                      Storage::disk('public_posts')->delete($file);
                    }
                }
               
                //Genero el nombre nuevo de la imagen con la extensión original
                $nombre_foto_cine = 'foto_con_ine'.Str::slug($nombre).'.'.$this->foto_cine->getClientOriginalExtension();
                //Especifico la ruta para guardar la imagen para intervention image
                $path_foto = public_path('posts'.'/'.$nombre_foto_cine);
                //Genero la nueva imagen con intervention image donde sea que este almacenada
                $comp_foto = Image::make($this->foto_cine->getRealPath());
                //guardo la imagen con la ruta especificada arriba y la comprimo al 40%
                $comp_foto->save($path_foto,40);
                //Cambio la ruta de la imagen nueva en la base de datos
                $cambio = User::where('id','=',$id)->update(['foto_cine'=>'posts/'.$nombre_foto_cine]);
            }
            $this->emit('img');
            Buzon::create(['user_id'=>Auth::user()->id,'informacion'=>1]);
            $consulta = Solicitud_Credito::where('user_id','=',Auth::user()->id)->update(['estado'=>0,'documentacion'=>null,'mensaje'=>null]);
        }
       
    }
    
}

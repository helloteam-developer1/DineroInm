<?php

namespace Database\Seeders;

use App\Models\Amortizacion;
use App\Models\Empresas;
use App\Models\Pagos;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //Pagos::factory(15)->create();
        //Amortizacion::factory(15)->create();
        
        $empresas = [
            'ABC CAPITAL', 
            'ACTINVER',
            'ACCIVAL', 
            'AFIRME',
            'AKALA',
            'AMERICAN EXPRESS',
            'ASEA',
            'AUTOFIN', 
            'AZTECA' ,
            'BANAMEX',
            'BANCOMEXT',
            'BANOBRAS',
            'BBVA BANCOMER', 
            'BANJERCITO', 
            'BAJIO' ,
            'BANREGIO',
            'BANSI' ,
            'BANORTE',
            'BAMSA' ,
            'BMONEX', 
            'BARCLAYS',
            'BANCO FAMSA', 
            'BMULTIVA',
            'BANCOPPEL',
            'BBASE' ,
            'BANSEFI',
            'B&B',
            'BULLTICK CB', 
            'CREDIT SUISSE',
            'COMPARTAMOS', 
            'CONSUBANCO', 
            'CIBANCO',
            'CB ACTINVER', 
            'CBDEUTSCHE', 
            'CB INTERCAM', 
            'CI BOLSA',
            'CB JPMORGAN', 
            'CLS' ,
            'DEUTSCHE',
            'ESTRUCTURADORES',
            'EVERCORE',
            'FINAMEX', 
            'FINCOMUN', 
            'GBM', 
            'HSBC', 
            'HIPOTECARIA FEDERAL',
            'HDI SEGUROS',
            'IXE', 
            'INBURSA', 
            'INTERACCIONES', 
            'INVEX', 
            'ING', 
            'INTERBANCO', 
            'INDEVAL', 
            'JP MORGAN',
            'KUSPIT', 
            'LIBERTAD', 
            'MIFEL', 
            'MONEXCB', 
            'MASARI', 
            'MERRILL LYNCH', 
            'MAPFRE', 
            'NAFIN', 
            'OACTIN',
            'ORDER', 
            'PROFUTURO', 
            'REFORMA', 
            'SANTANDER', 
            'SCOTIABANK', 
            'SKANDIA', 
            'SU CASITA', 
            'STERLING', 
            'STP', 
            'SKANDIA', 
            'SEGMTY', 
            'SOFIEXPRESS', 
            'THE ROYAL BANK', 
            'TOKYO', 
            'TIBER', 
            'TELECOMM', 
            'UNICA', 
            'UNAGRA', 
            'VOLKSWAGEN', 
            'VALUE', 
            'VECTOR', 
            'VALMEX', 
            'WAL-MART', 
            'ZURICH', 
            'ZURICHVI'
        ];
        foreach($empresas as $e){
            Empresas::create(['name'=>$e]);
        }
        $carpeta = public_path('posts'); 
    
        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0755, true);
        } 
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $major_names = [
            'メンズ','レディース','ベビー・キッズ','その他'
        ];

        $men_items = [
            'トップス','ジャケット','スーツ'
        ];

        $women_items = [
            'トップス','ジャケット','スーツ'
        ];

        $kids_items = [
            'キッズ服','おもちゃ','おむつ'
        ];

        $others = [
            '本','ゲーム','音楽'
        ];

        foreach($major_names as $major_name){

            if($major_name == 'メンズ'){
                
                foreach($men_items as $men_item){

                    DB::table('categories')->insert([
                        [
                            'name' => $men_item,
                            'major_name' =>$major_name,
                        ],
                     ]);

                }

            }

            if($major_name == 'レディース'){
                
                foreach($women_items as $women_item){

                    DB::table('categories')->insert([
                        [
                            'name' => $women_item,
                            'major_name' =>$major_name,
                        ],
                     ]);

                }

            }

            if($major_name == 'ベビー・キッズ'){
                
                foreach($kids_items as $kids_item){

                    DB::table('categories')->insert([
                        [
                            'name' => $kids_item,
                            'major_name' =>$major_name,
                        ],
                     ]);

                }

            }

            if($major_name == 'その他'){
                
                foreach($others as $other){

                    DB::table('categories')->insert([
                        [
                            'name' => $other,
                            'major_name' =>$major_name,
                        ],
                     ]);

                }

            }


        }


        
        
    }
}

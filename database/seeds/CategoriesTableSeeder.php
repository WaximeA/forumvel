<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Add "Music sheets" category
        $category1 = new \App\Categories();
        $category1->id = 1;
        $category1->title = 'Music sheets';
        $category1->description = 'Find all music sheets you want.';
        $category1->creator_id = 1;
        $category1->save();

            // Add "Music sheets" sub-categories
            $subCategory1 = new \App\Categories();
            $subCategory1->id = 2;
            $subCategory1->title = 'Guitar';
            $subCategory1->description = 'Find all guitar music sheets you want.';
            $subCategory1->creator_id = 1;
            $subCategory1->parent_id = 1;
            $subCategory1->save();

                $subSubCategory1 = new \App\Categories();
                $subSubCategory1->id = 3;
                $subSubCategory1->title = 'Advanced';
                $subSubCategory1->description = 'Find all advanced guitar music sheets you want.';
                $subSubCategory1->creator_id = 1;
                $subSubCategory1->parent_id = 2;
                $subSubCategory1->save();

                $subSubCategory2 = new \App\Categories();
                $subSubCategory2->id = 4;
                $subSubCategory2->title = 'Novice';
                $subSubCategory2->description = 'Find all novice guitar music sheets you want.';
                $subSubCategory2->creator_id = 1;
                $subSubCategory2->parent_id = 2;
                $subSubCategory2->save();

            $subCategory2 = new \App\Categories();
            $subCategory2->id = 5;
            $subCategory2->title = 'Drum';
            $subCategory2->description = 'Find all drum music sheets you want.';
            $subCategory2->creator_id = 1;
            $subCategory2->parent_id = 1;
            $subCategory2->save();

            $subCategory3 = new \App\Categories();
            $subCategory3->id = 6;
            $subCategory3->title = 'Bass';
            $subCategory3->description = 'Find all guitar music sheets you want.';
            $subCategory3->creator_id = 1;
            $subCategory3->parent_id = 1;
            $subCategory3->save();

        // Add "Concerts" category
        $category2 = new \App\Categories();
        $category2->id = 7;
        $category2->title = 'Concerts';
        $category2->description = 'Find all concert.';
        $category2->creator_id = 1;
        $category2->save();

            // Add "Concerts" sub-categoryies
            $subCategory4 = new \App\Categories();
            $subCategory4->id = 8;
            $subCategory4->title = 'Metal';
            $subCategory4->description = 'Find all metal concert.';
            $subCategory4->creator_id = 1;
            $subCategory4->parent_id = 7;
            $subCategory4->save();

            $subCategory5 = new \App\Categories();
            $subCategory5->id = 9;
            $subCategory5->title = 'Rock';
            $subCategory5->description = 'Find all rock concert.';
            $subCategory5->creator_id = 1;
            $subCategory5->parent_id = 7;
            $subCategory5->save();

        // Add "Equipment" category
        $category3 = new \App\Categories();
        $category3->id = 10;
        $category3->title = 'Equipment';
        $category3->description = 'Find all music equipement you need.';
        $category3->creator_id = 1;
        $category3->save();

            // Add "Equipment" sub-categories
            $subCategory6 = new \App\Categories();
            $subCategory6->id = 11;
            $subCategory6->title = 'Sound & stage';
            $subCategory6->description = 'Find all sound & stage equipement you need.';
            $subCategory6->creator_id = 1;
            $subCategory6->parent_id = 10;
            $subCategory6->save();

                $subSubCategory3 = new \App\Categories();
                $subSubCategory3->id = 12;
                $subSubCategory3->title = 'Amp';
                $subSubCategory3->description = 'Find all amp equipement you need.';
                $subSubCategory3->creator_id = 1;
                $subSubCategory3->parent_id = 10;
                $subSubCategory3->save();

            $subCategory7 = new \App\Categories();
            $subCategory7->id = 13;
            $subCategory7->title = 'Piano';
            $subCategory7->description = 'Find all piano equipement you need.';
            $subCategory7->creator_id = 1;
            $subCategory7->parent_id = 10;
            $subCategory7->save();
    }
}

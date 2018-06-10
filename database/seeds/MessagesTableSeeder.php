<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Add comments
        $comment1 = new \App\Comments();
        $comment1->id = 1;
        $comment1->content = 'I\'ve got a question : how music sheets works ??';
        $comment1->user_id = 4;
        $comment1->topic_id = 1;
        $comment1->save();

            $comment2 = new \App\Comments();
            $comment2->id = 2;
            $comment2->content = 'Search on google..';
            $comment2->user_id = 3;
            $comment2->topic_id = 1;
            $comment2->parent_id = 1;
            $comment2->save();

                $comment3 = new \App\Comments();
                $comment3->id = 3;
                $comment3->content = 'Thks...';
                $comment3->user_id = 4;
                $comment3->topic_id = 1;
                $comment3->parent_id = 2;
                $comment3->save();

        $comment4 = new \App\Comments();
        $comment4->id = 4;
        $comment4->content = 'Tablatures are easier !';
        $comment4->user_id = 5;
        $comment4->topic_id = 2;
        $comment4->save();

        $comment5 = new \App\Comments();
        $comment5->id = 5;
        $comment5->content = 'This music is soooooo good.. I want to give you a tips : add delay and reverb to your guitar, it sound better.';
        $comment5->user_id = 1;
        $comment5->topic_id = 4;
        $comment5->save();

            $comment6 = new \App\Comments();
            $comment6->id = 6;
            $comment6->content = 'I agree, i think is the better Pink floyd song ! Thanks for your tip ;).';
            $comment6->user_id = 3;
            $comment6->topic_id = 4;
            $comment6->parent_id = 5;
            $comment6->save();

                $comment7 = new \App\Comments();
                $comment7->id = 7;
                $comment7->content = 'You\'r welcome !';
                $comment7->user_id = 1;
                $comment7->topic_id = 4;
                $comment7->parent_id = 6;
                $comment7->save();


    }
}

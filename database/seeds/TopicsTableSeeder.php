<?php

use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Add music sheets topic
        $topic1 = new \App\Topics();
        $topic1->id = 1;
        $topic1->title = 'How music sheets works ?';
        $topic1->content = 'I see further questions about it on the internet. I choose today to put the light on the dark side of (the moon) music learning : questions about music sheets.';
        $topic1->author_id = 3;
        $topic1->category_id = 1;
        $topic1->save();

        $topic2 = new \App\Topics();
        $topic2->id = 2;
        $topic2->title = 'Music sheets or tablatures ?';
        $topic2->content = 'All the point is in the title. Let discuss about it right here !';
        $topic2->author_id = 4;
        $topic2->category_id = 1;
        $topic2->save();


        // Add music sheets guitar topic
        $topic3 = new \App\Topics();
        $topic3->id = 3;
        $topic3->title = 'Learn easily music note on guitar neck.';
        $topic3->content = 'In this topic, i\'ll give you few tips to easily reconnized music note on your guitar neck.';
        $topic3->author_id = 4;
        $topic3->category_id = 2;
        $topic3->save();


        // Add music sheets guitar advanced topic
        $topic4 = new \App\Topics();
        $topic4->id = 4;
        $topic4->title = 'Comfortably Numb solo - Pink Floyd';
        $topic4->content = 'Advanced Comfortably Numb solo tablature. (1979 - Pink Floyd, The Wall.)';
        $topic4->author_id = 5;
        $topic4->category_id = 3;
        $topic4->save();

        // Add music sheets guitar advanced topic
        $topic5 = new \App\Topics();
        $topic5->id = 5;
        $topic5->title = 'Black Orhpeus - Paul Desmond';
        $topic5->content = 'Advanced Black Orhpeus tablature and chords.';
        $topic5->author_id = 4;
        $topic5->category_id = 3;
        $topic5->save();

        $topic6 = new \App\Topics();
        $topic6->id = 6;
        $topic6->title = 'Black Orhpeus - Paul Desmond';
        $topic6->content = 'Advanced Black Orhpeus tablature and chords.';
        $topic6->author_id = 4;
        $topic6->category_id = 3;
        $topic6->save();

        $topic7 = new \App\Topics();
        $topic7->id = 7;
        $topic7->title = ' - Paul Desmond';
        $topic7->content = 'Advanced Black Orhpeus tablature and chords.';
        $topic7->author_id = 4;
        $topic7->category_id = 3;
        $topic7->save();


        // Add music sheets guitar novice topic
        $topic8 = new \App\Topics();
        $topic8->id = 8;
        $topic8->title = 'Knockin’ on heavens door – Bob Dylan';
        $topic8->content = 'Novice  Knockin’ on heavens door – Bob Dylan chords.';
        $topic8->author_id = 1;
        $topic8->category_id = 4;
        $topic8->save();

        $topic9 = new \App\Topics();
        $topic9->id = 9;
        $topic9->title = 'Love me do – The Beatles';
        $topic9->content = 'Love me do – The Beatles chords.';
        $topic9->author_id = 5;
        $topic9->category_id = 4;
        $topic9->save();

        $topic10 = new \App\Topics();
        $topic10->id = 10;
        $topic10->title = 'Otherside – Red hot chilli peppers';
        $topic10->content = 'Otherside – Red hot chilli peppers chords.';
        $topic10->author_id = 5;
        $topic10->category_id = 4;
        $topic10->save();


        // Add concert topic
        $topic11 = new \App\Topics();
        $topic11->id = 11;
        $topic11->title = 'Few tips to know when you go to a concert';
        $topic11->content = 'Let discuss about the rules to respect when you assist to a concert.';
        $topic11->author_id = 3;
        $topic11->category_id = 7;
        $topic11->save();

        $topic12 = new \App\Topics();
        $topic12->id = 12;
        $topic12->title = 'Famous metal concert dances';
        $topic12->content = 'List all metal concert dances you know and join it with an anecdote';
        $topic12->author_id = 3;
        $topic12->category_id = 8;
        $topic12->save();

        $topic13 = new \App\Topics();
        $topic13->id = 13;
        $topic13->title = 'World best rock concert ?';
        $topic13->content = 'Hard question, which rock concert it\'s for you the best in the world ?';
        $topic13->author_id = 5;
        $topic13->category_id = 9;
        $topic13->save();


        // Add amp topic
        $topic14 = new \App\Topics();
        $topic14->id = 14;
        $topic14->title = 'Help me to choose my new guitar amp';
        $topic14->content = 'I want to play jazz, blues and sometimes rock, help me !';
        $topic14->author_id = 2;
        $topic14->category_id = 12;
        $topic14->save();

        $topic15 = new \App\Topics();
        $topic15->id = 15;
        $topic15->title = 'How the tube amp is important for sound !';
        $topic15->content = 'Watt between tupe, there is a difference !';
        $topic15->author_id = 5;
        $topic15->category_id = 12;
        $topic15->save();
    }
}

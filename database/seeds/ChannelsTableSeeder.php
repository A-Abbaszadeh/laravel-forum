<?php

use App\Channel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::created([
            [
                'title' => 'Laravel 5.8',
                'slug' => Str::slug('Laravel 5.8')
            ],
            [
                'title' => 'Vue Js',
                'slug' => Str::slug('Vue Js')
            ],
            [
                'title' => 'Angular 7',
                'slug' => Str::slug('Angular 7')
            ],
            [
                'title' => 'Node JS',
                'slug' => Str::slug('Node JS')
            ],
        ]);
    }
}

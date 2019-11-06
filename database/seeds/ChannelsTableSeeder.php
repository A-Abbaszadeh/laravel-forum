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
        Channel::insert([
            [
                'name' => 'Laravel 5.8',
                'slug' => Str::slug('Laravel 5.8')
            ],
            [
                'name' => 'Vue Js',
                'slug' => Str::slug('Vue Js')
            ],
            [
                'name' => 'Angular 7',
                'slug' => Str::slug('Angular 7')
            ],
            [
                'name' => 'Node JS',
                'slug' => Str::slug('Node JS')
            ],
        ]);
    }
}

<?php

class KeymapsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('keymaps')->delete();

        DB::table('keymaps')->insert( array(
                array(
                    'letter'    => 'A',
                    'number'    => '2',
                ),
                array(
                    'letter'    => 'B',
                    'number'    => '2',
                ),
                array(
                    'letter'    => 'C',
                    'number'    => '2',
                ),
                array(
                    'letter'    => 'D',
                    'number'    => '3',
                ),
                array(
                    'letter'    => 'E',
                    'number'    => '3',
                ),
                array(
                    'letter'    => 'F',
                    'number'    => '3',
                ),
                array(
                    'letter'    => 'G',
                    'number'    => '4',
                ),
                array(
                    'letter'    => 'H',
                    'number'    => '4',
                ),
                array(
                    'letter'    => 'I',
                    'number'    => '4',
                ),
                array(
                    'letter'    => 'J',
                    'number'    => '5',
                ),
                array(
                    'letter'    => 'K',
                    'number'    => '5',
                ),
                array(
                    'letter'    => 'L',
                    'number'    => '5',
                ),
                array(
                    'letter'    => 'M',
                    'number'    => '6',
                ),
                array(
                    'letter'    => 'N',
                    'number'    => '6',
                ),
                array(
                    'letter'    => 'O',
                    'number'    => '6',
                ),
                array(
                    'letter'    => 'P',
                    'number'    => '7',
                ),
                array(
                    'letter'    => 'Q',
                    'number'    => '7',
                ),
                array(
                    'letter'    => 'R',
                    'number'    => '7',
                ),
                array(
                    'letter'    => 'S',
                    'number'    => '7',
                ),
                array(
                    'letter'    => 'T',
                    'number'    => '8',
                ),
                array(
                    'letter'    => 'U',
                    'number'    => '8',
                ),
                array(
                    'letter'    => 'V',
                    'number'    => '8',
                ),
                array(
                    'letter'    => 'W',
                    'number'    => '9',
                ),
                array(
                    'letter'    => 'X',
                    'number'    => '9',
                ),
                array(
                    'letter'    => 'Y',
                    'number'    => '9',
                ),
                array(
                    'letter'    => 'Z',
                    'number'    => '9',
                ))
        );
    }
}

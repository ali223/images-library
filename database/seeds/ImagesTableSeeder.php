<?php

use App\Image;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as ImageUtility;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	ini_set('memory_limit','512M');

        $titles = [
        	'image-1.jpg' => 'Who are we',
        	'image-2.jpg' => 'Partnership rationale',
        	'image-3.jpg' => 'Partnership rationale',
        	'image-4.jpg' => 'The Opportunity',
        	'image-5.jpg' => 'Our clubs',
        ];

        foreach (Storage::files() as $file) {

        	if (! isset($titles[$file])) {
        		continue;
        	}
			
			$path = storage_path('app/public/');

            $thumbnailFileName = $this->createThumbnail($path, $file);

        	factory(Image::class)->create([
        		'title' => $titles[$file],
        		'image_path' => $file,
        		'thumbnail_path' => $thumbnailFileName
        	]);
        }
    }

    private function createThumbnail($path, $file)
    {
        $thumbnailFileName = pathinfo($path . $file, PATHINFO_FILENAME) . '-thumbs.jpg';

        ImageUtility::make($path . $file)
                    ->fit(300, 200)
                    ->save($path . $thumbnailFileName);

        return $thumbnailFileName;
    }
}

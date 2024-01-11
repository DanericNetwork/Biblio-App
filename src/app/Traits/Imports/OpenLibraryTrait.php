<?php

namespace App\Traits\Imports;

use App\Models\Item;
use App\Models\User;
use App\Traits\CommonLibraryTrait;

trait OpenLibraryTrait
{
    use CommonLibraryTrait;
    public function importOpenLibrary($tries = 3) {
        if ($tries < 1) $tries = 3;

        $maxOffset = (int) ceil(100 * $tries / 100) * 100;
        $offset = 100;
        $loop = (int) ceil($offset / 100);

        for ($i = 0; $i < $loop; $i++) {
            $this->import($offset);
            if ($offset >= $maxOffset) {
                break;
            }
            $offset += 100;
        };
    }

    private function import($offset) {
        $books = $this->getData($offset);

        foreach ($books as $book) {
            $this->importBook($book);
        }
    }

    private function importBook($book) {
        Item::create([
            'identifier' => $this->generateValidItemIdentifier(),
            'type' => 'book',
            'name' => $book['title'],
            'description' => "Dit boek is geschreven door {$book['author_name'][0]} en is uitgegeven in {$book['first_publish_year']}.",
            'category' => 1,
            'ISBN' => $book['isbn'][0],
            'rating' => 1,
            'borrowing_time' => 30,
            'modified_kind' => 'I',
            'modified_user' => User::where('email', 'superadmin@biblio.nl')->first()->id,
        ]);
    }

    private function getData($offset)
    {
        $baseUrl = "https://openlibrary.org/search.json?q=language%3Adut&sort=new&lang=nl&offset=" . $offset;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $baseUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);

        $response = json_decode($response, true);
        return $response['docs'];
    }
}

<?php

namespace App\Traits;

use App\Models\Item;
use App\Models\LibraryPass;
use Illuminate\Support\Env;

trait CommonLibraryTrait {

    /**
     * @return string A valid library pass barcode
     */
    public function generateValidLibraryPassBarCode(): string
    {
        $barcode = $this->generateLibraryPassBarCode();
        while($this->isLibraryPassBarCodeAlreadyInUse($barcode)) {
            $barcode = $this->generateLibraryPassBarCode();
        }
        return $barcode;
    }

    /**
     * @return string A random library pass barcode
     */
    private function generateLibraryPassBarCode(): string
    {
        $prefix = Env::get('BARCODE_COMPANY_PREFIX');
        return $prefix . $this->generateRandomNumber(9);
    }

    /**
     * @param $length
     * @return string A random number with the given length
     */
    public function generateRandomNumber($length): string
    {
        $result = '';
        for($i = 0; $i < $length; $i++) {
            $result .= mt_rand(0, 9);
        }
        return $result;
    }

    /**
     * @param $barcode
     * @return bool True if the barcode is already in use, false otherwise
     */
    private function isLibraryPassBarCodeAlreadyInUse($barcode): bool
    {
        return LibraryPass::where('barcode', $barcode)->exists();
    }


    public function generateValidItemIdentifier(): string
    {
        $identifier = $this->generateItemIdentifier();
        while($this->isItemIdentifierAlreadyInUse($identifier)) {
            $identifier = $this->generateItemIdentifier();
        }
        return $identifier;
    }

    private function generateItemIdentifier(): string
    {
        $prefix = "ITM";
        return $prefix . $this->generateRandomNumber(16);
    }

    private function isItemIdentifierAlreadyInUse($identifier): bool
    {
        return Item::where('identifier', $identifier)->exists();
    }
}


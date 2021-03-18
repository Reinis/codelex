<?php


namespace App\Services;


use App\Entities\Collections\Flowers;
use App\Entities\Flower;
use InvalidArgumentException;

class CsvService implements DataServiceInterface
{

    private const STORAGE_DIR = 'storage';
    private string $csvFileName;

    public function __construct(string $csvFileName)
    {
        $this->csvFileName = $csvFileName;
    }

    public function getAllFlowers(): Flowers
    {
        $filename = implode(DIRECTORY_SEPARATOR, [self::STORAGE_DIR, $this->csvFileName]);

        if (($handle = fopen($filename, 'rb')) === false) {
            throw new InvalidArgumentException("Could not open file for reading: {$this->csvFileName}");
        }

        $flowers = new Flowers();

        /** @var string[] $data */
        while (($data = fgetcsv($handle, 1000, ';')) !== false && $data !== null) {
            if (isset($data[0], $data[1], $data[2])) {
                $flowers->addFlower(new Flower($data[0], $data[1], $data[2]));
            }
        }

        fclose($handle);

        return $flowers;
    }
}
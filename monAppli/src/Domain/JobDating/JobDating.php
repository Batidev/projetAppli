<?php
declare(strict_types=1);

namespace App\Domain\JobDating;

use JsonSerializable;
use phpDocumentor\Reflection\Types\Object_;

class JobDating implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $proName;

    /**
     * @var string
     */
    private $studentName;

    /**
     * @param int|null $id
     * @param string $proName
     * @param string $studentName
     */
    public function __construct(?int $id, string $proName, string $studentName)
    {
        $this->id = $id;
        $this->proName = strtolower($proName);
        $this->studentName = ucfirst($studentName);
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->proName;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->studentName;
    }

    /**
     * @param objet $datas
     * @return bool
     */
    public function update(object $datas): bool
    {
        $response = false ;
        foreach ($datas as $k => $v){
            if (!empty($this->{$k}) && $this->{$k} !== $v) {
                $this->{$k} = $v ;
                $response = true ;
            }
        }
        return $response ;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'username' => $this->proName,
            'firstName' => $this->studentName,
        ];
    }
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Dato Entity
 *
 * @property int $id
 * @property string $data
 * @property \Cake\I18n\FrozenTime $hora
 * @property \Cake\I18n\FrozenDate $fecha
 * @property int $user_id
 * @property string $name
 *
 * @property \App\Model\Entity\User $user
 */
class Dato extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'data' => true,
        'hora' => true,
        'fecha' => true,
        'user_id' => true,
        'name' => true,
        'user' => true
    ];
}

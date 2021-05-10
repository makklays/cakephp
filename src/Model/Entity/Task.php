<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Task Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $description
 * @property string|null $address
 * @property string|null $cp
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Task[] $tasks
 */
class Task extends Entity
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
        'user_id' => true,
        'name' => true,
        'email' => true,
        'description' => true,
        'address' => true,
        'cp' => true,
        'created' => true,
        'modified' => true,
        'tasks' => true,
    ];
}

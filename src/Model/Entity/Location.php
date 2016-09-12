<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Location Entity
 *
 * @property int $id
 * @property string $name
 * @property int $state_id
 * @property int $city_id
 * @property int $parent_id
 * @property string $slug
 * @property string $parent_string
 * @property string $searchable_names
 * @property string $lat
 * @property string $lon
 * @property \Cake\I18n\Time $created
 * @property int $created_by
 * @property \Cake\I18n\Time $modified
 * @property int $modified_by
 * @property \Cake\I18n\Time $deleted
 * @property int $deleted_by
 * @property string $is_active
 * @property string $is_deleted
 * @property string $polygon
 * @property string $polygon_center
 * @property float $area
 * @property float $maxlat
 * @property float $minlat
 * @property float $maxlon
 * @property float $minlon
 * @property string $polyform
 * @property string $poly_temp
 *
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\ParentLocation $parent_location
 * @property \App\Model\Entity\ChildLocation[] $child_locations
 */
class Location extends Entity
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
        '*' => true,
        'id' => false
    ];
}

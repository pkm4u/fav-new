<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * City Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property int $property_show_count
 * @property int $builder_show_count
 * @property string $slug
 * @property int $state_id
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_desc
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $is_active
 * @property string $is_deleted
 * @property string $polygon
 * @property string $polygon_center
 * @property string $home_page_des_title
 * @property string $home_page_description
 * @property float $area
 * @property string $lat
 * @property string $lon
 * @property float $maxlat
 * @property float $minlat
 * @property float $maxlon
 * @property float $minlon
 * @property string $polyform
 * @property string $poly_temp
 * @property int $priority
 *
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\Location[] $locations
 */
class City extends Entity
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

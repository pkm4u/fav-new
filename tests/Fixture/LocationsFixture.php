<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LocationsFixture
 *
 */
class LocationsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 12, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'Auto generated primary key id', 'autoIncrement' => true, 'precision' => null],
        'name' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'This field stores lcoation name', 'precision' => null, 'fixed' => null],
        'state_id' => ['type' => 'integer', 'length' => 12, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'This is the foreign key refernces to states table.', 'precision' => null, 'autoIncrement' => null],
        'city_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'This is the foreign key refernces to cities table.', 'precision' => null, 'autoIncrement' => null],
        'parent_id' => ['type' => 'integer', 'length' => 12, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'This field stores the parent id of location.', 'precision' => null, 'autoIncrement' => null],
        'slug' => ['type' => 'string', 'length' => 200, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'This field stores the auto generated slug for location.', 'precision' => null, 'fixed' => null],
        'parent_string' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'THis field stores the location parent sting (hierarchy)', 'precision' => null, 'fixed' => null],
        'searchable_names' => ['type' => 'text', 'length' => 16777215, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'lat' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'lon' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'This field tores creation date of location', 'precision' => null],
        'created_by' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'This is the foreign key refernces to admins table.', 'precision' => null, 'autoIncrement' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'This field tores modification date of location', 'precision' => null],
        'modified_by' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'This is the foreign key refernces to admins table.', 'precision' => null, 'autoIncrement' => null],
        'deleted' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => 'This field stores the deletion time of location', 'precision' => null],
        'deleted_by' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'This is the foreign key refernces to admins table.', 'precision' => null, 'autoIncrement' => null],
        'is_active' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => '1', 'collate' => 'utf8_general_ci', 'comment' => 'for activate or de-activate', 'precision' => null],
        'is_deleted' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'This field determines that locaton is deleted or not', 'precision' => null],
        'polygon' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'polygon_center' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'area' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'maxlat' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'minlat' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'maxlon' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'minlon' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'polyform' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => null, 'comment' => '', 'precision' => null],
        'poly_temp' => ['type' => 'text', 'length' => 4294967295, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'name' => ['type' => 'index', 'columns' => ['name', 'city_id', 'is_deleted'], 'length' => []],
            'id' => ['type' => 'index', 'columns' => ['id'], 'length' => []],
            'city_id' => ['type' => 'index', 'columns' => ['city_id', 'is_deleted'], 'length' => []],
            'parent_id' => ['type' => 'index', 'columns' => ['parent_id', 'is_deleted'], 'length' => []],
            'parent_id_2' => ['type' => 'index', 'columns' => ['parent_id'], 'length' => []],
            'state_id' => ['type' => 'index', 'columns' => ['state_id', 'city_id', 'parent_id', 'is_active', 'is_deleted'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'name' => 'Lorem ipsum dolor sit amet',
            'state_id' => 1,
            'city_id' => 1,
            'parent_id' => 1,
            'slug' => 'Lorem ipsum dolor sit amet',
            'parent_string' => 'Lorem ipsum dolor sit amet',
            'searchable_names' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'lat' => 'Lorem ipsum dolor sit amet',
            'lon' => 'Lorem ipsum dolor sit amet',
            'created' => '2016-09-09 09:22:37',
            'created_by' => 1,
            'modified' => '2016-09-09 09:22:37',
            'modified_by' => 1,
            'deleted' => '2016-09-09 09:22:37',
            'deleted_by' => 1,
            'is_active' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'is_deleted' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'polygon' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'polygon_center' => 'Lorem ipsum dolor sit amet',
            'area' => 1,
            'maxlat' => 1,
            'minlat' => 1,
            'maxlon' => 1,
            'minlon' => 1,
            'polyform' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'poly_temp' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
        ],
    ];
}

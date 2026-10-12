<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Equipos Model
 *
 * @property \App\Model\Table\JugadoresTable&\Cake\ORM\Association\HasMany $Jugadores
 *
 * @method \App\Model\Entity\Equipo newEmptyEntity()
 * @method \App\Model\Entity\Equipo newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Equipo> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Equipo get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Equipo findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Equipo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Equipo> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Equipo|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Equipo saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Equipo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Equipo>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Equipo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Equipo> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Equipo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Equipo>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Equipo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Equipo> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EquiposTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('equipos');
        $this->setDisplayField('nombre');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Jugadores', [
            'foreignKey' => 'equipo_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('nombre')
            ->maxLength('nombre', 100)
            ->requirePresence('nombre', 'create')
            ->notEmptyString('nombre');

        return $validator;
    }
}

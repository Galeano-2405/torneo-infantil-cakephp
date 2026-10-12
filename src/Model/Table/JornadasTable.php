<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Jornadas Model
 *
 * @property \App\Model\Table\GolesTable&\Cake\ORM\Association\HasMany $Goles
 *
 * @method \App\Model\Entity\Jornada newEmptyEntity()
 * @method \App\Model\Entity\Jornada newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Jornada> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Jornada get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Jornada findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Jornada patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Jornada> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Jornada|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Jornada saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Jornada>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Jornada>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Jornada>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Jornada> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Jornada>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Jornada>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Jornada>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Jornada> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class JornadasTable extends Table
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

        $this->setTable('jornadas');
        $this->setDisplayField('nombre');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Goles', [
            'foreignKey' => 'jornada_id',
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

        $validator
            ->date('fecha')
            ->requirePresence('fecha', 'create')
            ->notEmptyDate('fecha');

        return $validator;
    }
}

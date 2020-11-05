<?php


namespace App\Repositories\Eloquent;
use App\Models\Relation;
use App\Repositories\RelationRepositoryInterface;
use Illuminate\Support\Collection;
class RelationRepository extends BaseRepository implements RelationRepositoryInterface
{
 /**
 * UserRepository constructor.
 *
 * @param User $model
 */
 public function __construct(Relation $model)
 {
 parent::__construct($model);
 }
 /**
 * @return Collection
 */
 public function all(): Collection
 {
 return $this->model->all();
 }

}

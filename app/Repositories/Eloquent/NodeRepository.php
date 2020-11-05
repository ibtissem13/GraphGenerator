<?php


namespace App\Repositories\Eloquent;
use App\Models\Node;
use App\Repositories\NodeRepositoryInterface;
use Illuminate\Support\Collection;
class NodeRepository extends BaseRepository implements NodeRepositoryInterface
{
 /**
 * UserRepository constructor.
 *
 * @param User $model
 */
 public function __construct(Node $model)
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

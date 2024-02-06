<?php

namespace Tdwesten\StatamicBuilder\FieldTypes;

use Illuminate\Support\Collection;
use Tdwesten\StatamicBuilder\Contracts\Makeble;
use Tdwesten\StatamicBuilder\Contracts\MaxItems;
use Tdwesten\StatamicBuilder\Contracts\QueryScopes;
use Tdwesten\StatamicBuilder\Contracts\UISelectMode;

class Entries extends Field
{
    use Makeble;
    use MaxItems;
    use QueryScopes;
    use UISelectMode;

    protected $type = 'entries';

    protected $create = true;

    protected $collections;

    protected $searchIndex;

    public function __construct(string $handle)
    {
        parent::__construct($handle);
    }

    public function fieldToArray(): Collection
    {
        return collect([
            'max_items' => $this->maxItems,
            'mode' => $this->mode->value,
            'collections' => $this->collections,
            'search_index' => $this->searchIndex,
        ]);
    }

    public function collections(array $collections): self
    {
        $this->collections = $collections;

        return $this;
    }

    public function searchIndex(string $searchIndex): self
    {
        $this->searchIndex = $searchIndex;

        return $this;
    }
}

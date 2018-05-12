<?php
/**
 * Created by PhpStorm.
 * User: alive
 * Date: 5/7/18
 * Time: 8:10 AM
 */

namespace Alive2212\LaravelSmartMeta;

use Illuminate\Support\Facades\Cache;

trait SmartMeta
{
    protected $id;

    protected $cacheMetas;

    protected $globalKey;

    protected $expireTime = 5; // 5 minutes

    /**
     *
     *
     * @return $this
     */
    public function initCache()
    {
        if(!($this->id>0)){
            $this->id = $this->toArray()['id'];
        }
        if (is_null($this->globalKey)){
            $this->globalKey = get_class($this) . '_' . $this->id;
        }
        $this->getAllCacheMeta();
        return $this;
    }

    /**
     *
     *
     * @param $key
     * @param $value
     * @return $this
     */
    public function putCacheMeta($key, $value)
    {
        $this->initCache();
        $value = [$key => $value];
        Cache::put($this->globalKey, $value, $this->expireTime);
        return $this;
    }

//    /**
//     * @return array
//     */
//    public function getAllCacheMeta(): array
//    {
//        return (Cache::get($this->globalKey));
//    }


    /**
     * @param $key
     * @param null $default
     * @param bool $getObj
     * @return null
     */
    public function getCacheMeta($key, $default = null, $getObj = false)
    {
        $this->initCache();
        if (isset($this->cacheMetas[$key])) {
            return $this->cacheMetas[$key];
        }
        return $default;
    }

    /**
     * @param $key
     * @return $this
     */
    public function deleteCacheMeta($key)
    {
        $this->initCache();
        unset($this->cacheMetas[$key]);
        $this->setAllCacheMeta();
        return $this;
    }

    /**
     *
     */
    public function deleteCacheMetas()
    {
        $this->initCache();
        $this->cacheMetas = null;
        $this->setAllCacheMeta();
        return $this;
    }

    /**
     * @param $key
     * @param $value
     */
    public function addCacheMeta($key, $value)
    {
        $this->initCache();
        $this->cacheMetas = array_add($this->cacheMetas, $key, $value);
        $this->setAllCacheMeta();
    }

    /**
     * @param $value
     * @return $this
     */
    public function pushCacheMeta($value)
    {
        $this->initCache();
        array_push($this->cacheMetas, $value);
        $this->setAllCacheMeta();
        return $this;
    }

    /**
     * @param $key
     * @param $default
     * @return $this
     */
    public function pullCacheMeta($key, $default = null)
    {
        $this->initCache();
        array_pull($this->cacheMetas, $key, $default);
        $this->setAllCacheMeta();
        return $this;
    }

    /**
     * @return $this
     */
    public function setAllCacheMeta()
    {
        Cache::put($this->globalKey, $this->cacheMetas, $this->expireTime);
        return $this;
    }

    /**
     * @return $this
     */
    public function getAllCacheMeta()
    {
        $this->cacheMetas = Cache::get($this->globalKey);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getGlobalKey()
    {
        return $this->globalKey;
    }

    /**
     * @param mixed $globalKey
     */
    public function setGlobalKey($globalKey)
    {
        $this->globalKey = $globalKey;
    }

    /**
     * @return int
     */
    public function getExpireTime(): int
    {
        return $this->expireTime;
    }

    /**
     * @param int $expireTime
     */
    public function setExpireTime(int $expireTime)
    {
        $this->expireTime = $expireTime;
    }

    /**
     * @return mixed
     */
    public function getCacheMetas()
    {
        return $this->cacheMetas;
    }

    /**
     * @param mixed $cacheMetas
     */
    public function setCacheMetas($cacheMetas)
    {
        $this->cacheMetas = $cacheMetas;
    }
}
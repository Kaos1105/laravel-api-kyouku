<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\BaseRepositoryInterface;
use App\Repositories\Contracts\SystemManagementRepositoryInterface;
use App\Repositories\Contracts\SystemSettingRepositoryInterface;
use App\Repositories\Contracts\SystemMessageRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\PeriodRepositoryInterface;
use App\Repositories\Contracts\DeviceManagementRepositoryInterface;
use App\Repositories\Contracts\GroupRepositoryInterface;
use App\Repositories\Contracts\StaffRepositoryInterface;
use App\Repositories\Contracts\StaffSettingRepositoryInterface;
use App\Repositories\Contracts\NotificationRepositoryInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\ThemeRepositoryInterface;
use App\Repositories\Contracts\TermRepositoryInterface;
use App\Repositories\Contracts\ResultRepositoryInterface;
use App\Repositories\Eloquents\BaseRepository;
use App\Repositories\Eloquents\SystemManagementRepository;
use App\Repositories\Eloquents\SystemSettingRepository;
use App\Repositories\Eloquents\SystemMessageRepository;
use App\Repositories\Eloquents\UserRepository;
use App\Repositories\Eloquents\PeriodRepository;
use App\Repositories\Eloquents\DeviceManagementRepository;
use App\Repositories\Eloquents\GroupRepository;
use App\Repositories\Eloquents\StaffRepository;
use App\Repositories\Eloquents\StaffSettingRepository;
use App\Repositories\Eloquents\NotificationRepository;
use App\Repositories\Eloquents\CategoryRepository;
use App\Repositories\Eloquents\ThemeRepository;
use App\Repositories\Eloquents\TermRepository;
use App\Repositories\Eloquents\ResultRepository;

class RepositoryServiceProvider extends ServiceProvider
{
   /**
    * Register services.
    *
    * @return void
    */
   public function register()
   {
       $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
       $this->app->bind(SystemManagementRepositoryInterface::class, SystemManagementRepository::class);
       $this->app->bind(SystemSettingRepositoryInterface::class, SystemSettingRepository::class);
       $this->app->bind(SystemMessageRepositoryInterface::class, SystemMessageRepository::class);
       $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
       $this->app->bind(PeriodRepositoryInterface::class, PeriodRepository::class);
       $this->app->bind(DeviceManagementRepositoryInterface::class, DeviceManagementRepository::class);
       $this->app->bind(GroupRepositoryInterface::class, GroupRepository::class);
       $this->app->bind(StaffRepositoryInterface::class, StaffRepository::class);
       $this->app->bind(StaffSettingRepositoryInterface::class, StaffSettingRepository::class);
       $this->app->bind(NotificationRepositoryInterface::class, NotificationRepository::class);
       $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
       $this->app->bind(ThemeRepositoryInterface::class, ThemeRepository::class);
       $this->app->bind(TermRepositoryInterface::class, TermRepository::class);
       $this->app->bind(ResultRepositoryInterface::class, ResultRepository::class);
   }

   /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

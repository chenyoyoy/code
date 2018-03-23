package com.teach.yo.codeshop.app;

import android.app.Application;
import android.os.Process;
import android.util.Log;

import com.nostra13.universalimageloader.core.ImageLoader;
import com.nostra13.universalimageloader.core.ImageLoaderConfiguration;

/**
 * 说明：
 *
 * @author chenyou
 * @date 2016/04/10
 */
public class TeaApplication extends Application {

    private String TAG = "TeaApplication";

    @Override
    public void onCreate() {
        super.onCreate();
        Log.d(TAG, "TeaApplication onCreate pid:"+ Process.myPid());
    }
}

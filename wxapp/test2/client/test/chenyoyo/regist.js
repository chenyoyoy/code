// test/chenyoyo/regist.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    name: "默认名称",
    phone: "默认电话"
  },

  commit: function () {
    wx.showLoading({
      title: this.data.name + ':' + this.data.phone,
      mask: true,
      success: function (res) { },
      fail: function (res) { },
      complete: function (res) { },
    })


    wx.request({
      url: 'https://0dsdg2qq.qcloud.la/business/registerr.php',
      method: "post",
      header: {
        "Content-Type": "application/x-www-form-urlencoded"
      }, data: {
        "name": this.data.name,
        "phone": this.data.phone
      }, success: function (res) {
        console.log(res);

      }, fail: function (res) {
        console.log(res);
      }, complete: function () {
        wx.hideLoading();
      }
    })

  },

  bind_name: function (e) {
    this.setData({
      name: e.detail.value
    });
    console.log(e.detail.value);
  },

  bind_phone: function (e) {
    this.setData({
      phone: e.detail.value
    })
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {

  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {

  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function () {

  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide: function () {

  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload: function () {

  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh: function () {

  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: function () {

  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {

  }
})
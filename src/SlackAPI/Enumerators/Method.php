<?php

namespace SlackPHP\SlackAPI\Enumerators;

use MyCLabs\Enum\Enum;
/**
 * Enumerator for methods from Slack API
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @see https://api.slack.com/methods
 */
class Method extends Enum
{
    #api
    const apiTest = 'api.test';
    
    #auth
    const authRevoke = 'auth.revoke';
    const authTest = 'auth.test';
    
    #bots
    const botsInfo = 'bots.info';
    
    #channels
    const channelsArchive = 'channels.archive';
    const channelsCreate = 'channels.create';
    const channelsHistory = 'channels.history';
    const channelsInfo = 'channels.info';
    const channelsInvite = 'channels.invite';
    const channelsJoin = 'channels.join';
    const channelsKick = 'channels.kick';
    const channelsLeave = 'channels.leave';
    const channelsList = 'channels.list';
    const channelsMark = 'channels.mark';
    const channelsRename = 'channels.rename';
    const channelsReplies = 'channels.replies';
    const channelsSetPerpose = 'channels.setPurpose';
    const channelsSetTopic = 'channels.setTopic';
    const channelsUnarchive = 'channels.unarchive';
    
    #chat
    const chatDelete = 'chat.delete';
    const chatMeMessage = 'chat.meMessage';
    const chatPostMessage = 'chat.postMessage';
    const chatUnfurl = 'chat.unfurl';
    const chatUpdate = 'chat.update';
    
    #dnd
    const dndEndDnd = 'dnd.endDnd';
    const dndEndSnooze = 'dnd.endSnooze';
    const dndInfo = 'dnd.info';
    const dndSetSnooze = 'dnd.setSnooze';
    const dndTeamInfo = 'dnd.teamInfo';
    
    #emoji
    const emojiList = 'emojiList';
    
    #files.comments
    const filesCommentsAdd = 'files.comments.add';
    const filesCommentsDelete = 'files.comments.delete';
    const filesCommentsEdit = 'files.comments.edit';
    
    #files
    const filesDelete = 'files.delete';
    const filesInfo = 'files.info';
    const filesList = 'files.list';
    const filesRevokePublicURL = 'files.revokePublicURL';
    const filesSharedPublicURL = 'files.sharedPublicURL';
    const filesUpload = 'files.upload';
    
    #groups
    const groupsArchive = 'groups.archive';
    const groupsClose = 'groups.close';
    const groupsCreate = 'groups.create';
    const groupsCreateChild = 'groups.createChild';
    const groupsHistory = 'groups.history';
    const groupsInfo = 'groups.info';
    const groupsInvite = 'groups.invite';
    const groupsKick = 'groups.kick';
    const groupsLeave = 'groups.leave';
    const groupsList = 'groups.list';
    const groupsMark = 'groups.mark';
    const groupsOpen = 'groups.open';
    const groupsRename = 'groups.rename';
    const groupsReplies = 'groups.replies';
    const groupsSetPurpose = 'groups.setPurpose';
    const groupsSetTopic = 'groups.setTopic';
    const groupsUnarchive = 'groups.unarchive';
    
    #im
    const imClose = 'im.close';
    const imHistory = 'im.history';
    const imList = 'im.list';
    const imMark = 'im.mark';
    const imOpen = 'im.open';
    const imReplies = 'im.replies';
    
    #mpim
    const mpimClose = 'mpim.close';
    const mpimHistory = 'mpim.history';
    const mpimList = 'mpim.list';
    const mpimMark = 'mpim.mark';
    const mpimOpen = 'mpim.open';
    const mpimReplies = 'mpim.replies';
    
    #oauth
    const oauthAccess = 'oauth.access';
    
    #pins
    const pinsAdd = 'pins.add';
    const pinsList = 'pins.list';
    const pinsRemove = 'pins.remove';
    
    #reactions
    const reactionsAdd = 'reactions.add';
    const reactionsGet = 'reactions.get';
    const reactionsList = 'reactions.list';
    const reactionsRemove = 'reactions.remove';
    
    #reminders
    const remindersAdd = 'reminders.add';
    const remindersComplete = 'reminders.complete';
    const remindersDelete = 'reminders.delete';
    const remindersInfo = 'reminders.info';
    const remindersList = 'reminders.list';
    
    #rtm
    const rtmConnect = 'rtm.connect';
    const rtmStart = 'rtm.start';
    
    #search
    const searchAll = 'search.all';
    const searchFiles = 'search.files';
    const searchMessages = 'search.messages';
    
    #stars
    const starsAdd = 'stars.add';
    const starsList = 'stars.list';
    const starsRemove = 'stars.remove';
    
    #team
    const teamAccessLogs = 'team.accessLogs';
    const teamBillableInfo = 'team.billableInfo';
    const teamInfo = 'team.info';
    const teamIntegrationLogs = 'team.integrationLogs';
    
    #team.profile
    const teamProfileGet = 'team.profile.get';
    
    #usergroups
    const usergroupsCreate = 'usergroups.create';
    const usergroupsDisable = 'usergroups.disable';
    const usergroupsEnable = 'usergroups.enable';
    const usergroupsList = 'usergroups.list';
    const usergroupsUpdate = 'usergroups.update';
    
    #usergroups.users
    const usergroupsUsersList = 'usergroups.users.list';
    const usergroupsUsersUpdate = 'usergroups.users.update';
    
    #users
    const usersDeletePhoto = 'users.deletePhoto';
    const usersGetPresence = 'users.getPresence';
    const usersIdentity = 'users.identity';
    const usersInfo = 'users.info';
    const usersList = 'users.list';
    const usersSetActive = 'users.setActive';
    const usersSetPhoto = 'users.setPhoto';
    const usersSetPresence = 'users.setPresence';
    
    #users.profile
    const usersProfileGet = 'users.profile.get';
    const usersProfileSet = 'users.profile.set';
    
    /**
     * Validate method if it can be used with App Bot
     * 
     * @see https://api.slack.com/bot-users#method_list
     * @param string $method
     * @return bool
     */
    public static function isAvailableToBot($method)
    {
        return in_array($method, [
            self::apiTest,
            self::authTest,
            self::channelsInfo,
            self::channelsList,
            self::chatMeMessage,
            self::chatPostMessage,
            self::chatUpdate,
            self::dndInfo,
            self::dndTeamInfo,
            self::filesCommentsAdd,
            self::filesCommentsDelete,
            self::filesCommentsEdit,
            self::filesDelete,
            self::filesInfo,
            self::filesUpload,
            self::groupsInfo,
            self::groupsList,
            self::imClose,
            self::imHistory,
            self::imList,
            self::imMark,
            self::imOpen,
            self::mpimClose,
            self::mpimHistory,
            self::mpimList,
            self::mpimMark,
            self::mpimOpen,
            self::oauthAccess,
            self::pinsAdd,
            self::pinsRemove,
            self::reactionsAdd,
            self::reactionsGet,
            self::reactionsList,
            self::reactionsRemove,
            self::rtmConnect,
            self::rtmStart,
            self::starsAdd,
            self::starsRemove,
            self::teamInfo,
            self::usersGetPresence,
            self::usersInfo,
            self::usersList,
            self::usersSetActive,
            self::usersSetPresence,
        ]);
    }
}
<?php

namespace App\Repositories;

use App\Http\Requests\RankOrderRequest;
use App\Models\OrderRating;
use App\Models\User;

class UserRepository
{
    public function rankOrder(int $orderId ,int $userId,int $rating,string $feedback = null)
    {
        OrderRating::create([
            'user_id' => $userId,
            'order_id' => $orderId,
            'rating' => $rating,
            'feedback' => $feedback,
        ]);
    }

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @param integer $role
     * @return User
     */
    public function create(string $name,string $email,string $password,int $role,$mobile): User
    {
        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'role' => $role,
            'mobile' => $mobile
        ]);
    }


    public function updateUser(int $userId,int $role=null,string $email=null,string $name=null,string $password = null)
    {
        $user = User::find($userId);
        $data = [
            'name' => $name ?? $user->name,
            'email' => $email ?? $user->email,
            'role' => $role ?? $user->role
        ];
        if(!is_null($password)){
            $data['password']=bcrypt($password);
        }
        $user->update($data);
    }

    public function deleteUser(int $userId)
    {
        User::find($userId)->delete();
    }

    public function createTicket(string $ticketCatId,string $title,string $message,int $priority )
    {
        $ticket = Ticket::create([
            'ticket_category_id'=>$ticketCatId,
            'user_id'=>auth()->user()->id,
            'title'=>$title,
            'priority'=>$priority,
        ]);
        TicketMessage::create([
            'ticket_id'=>$ticket->id,
            'user_id'=>\auth()->user()->id,
            'message'=>$message
        ]);
    }

    public function updateTicket(string $ticketId,int $priority =null,string $status=null,int $isResolved=null)
    {
        if($ticket = Ticket::where('id',$ticketId)->first()){
            $ticket->update([
                'priority'=>$priority ?? $ticket->priority,
                'status'=>$status ?? $ticket->status,
                'is_resolved'=>$isResolved ??$ticket->is_resolved
            ]);
        }
    }

    public function deleteTicket(string $ticketId)
    {
        if($ticket = Ticket::find($ticketId)){
            $ticket->delete();
        }
    }

}
